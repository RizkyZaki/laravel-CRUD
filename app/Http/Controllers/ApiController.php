<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Admin;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ApiController extends Controller
{
    // public function produk() {
    //     $produk = Produk::all();

    //     return response()->json($produk);
    // }

    public function login(Request $request) {
        $password = md5($request->input('password'));
        $customer = Customer::where('email', $request->input('email'))->where('password', $password);
        if($customer->exists()){
            return response()->json([
                'status' => 'Login Berhasil',
                'customer' => $customer->first()
            ]);
        }
        return response()->json([
            'status' => 'Login Gagal'
        ]);
        
    }
    public function register(Request $request) {
        // $data = $request->validate([
        //     'nama_lengkap' => 'required|max:255',
        //     'email' => 'required|email|unique:customer',
        //     'password' => 'required|min:5',
        //     'no_hp' => 'required|max:255',
        //     'alamat_lengkap' => 'required|max:255'
        // ]);
        // $data['password'] = md5($data['password']);
        Customer::create($request->all());
        return response()->json([
            'status' => 'Daftar berhasi'
        ]);
    }

    public function getProduk () {
        $produk = Produk::limit(4)->with('category')->get();
        // $kategori = CategoryModel::limit(3)->get();
        $jumlahKategori = CategoryModel::count();
        $jumlahProduk = Produk::count();
        $jumlahAdmin = Admin::count();
        return response()->json([
            'produk' => $produk,
            // 'kategori' => $kategori,
            'jumlahKategori' => $jumlahKategori,
            'jumlahAdmin' => $jumlahAdmin,
            'jumlahProduk' => $jumlahProduk
        ]);
    }

    public function allProduk () {
        $produk = Produk::with('category')->get();
        $kategori = CategoryModel::all();
        return response()->json([
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function saveCart(Request $request) {

        

        return response()->json($request->all());
    }

    public function storeCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_kategori'=> 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY
        );
        }
        try {
            $kategori = CategoryModel::create($request->all());
            $response = [
                'message' => 'Category Created',
                'data' => $kategori
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message'=>"Failed" . $e->errorInfo
            ]);

        }
    }

    public function KategoriProduk ($id) {
        $kategori = CategoryModel::find($id);
        return response()->json([
            'produk' =>$kategori->product,
            'kategori' => $kategori->nama_kategori
        ]);
    }

    public function search($name) {
        $result = Produk::where('nama_produk', 'LIKE', '%'. $name . '%')->with('category')->get();
        if(count($result)) {
            return response()->json($result);
        } else {
            return response()->json(['result' => 'data not found'], 404);
        }
    }
}
