<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\Produk;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk', [
            'produk' => Produk::all(),
            'title' => 'Product List',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category = CategoryModel::all();
        return view('create-produk', [
            'category' => CategoryModel::all(),
            'title' => 'Create Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);
        $ekstensi = $request->file('gambar')->getClientOriginalExtension();
        $path = $request->file('gambar')->storeAs('gambar', $request->input('nama_produk').".". $ekstensi) ;
        Produk::create([
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'kategori_id' => $request->input('kategori_id'),
            'gambar' => $request->input('nama_produk').".". $ekstensi
        ]);
        return redirect('product')->with('berhasil', 'Produk Baru telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        $category = CategoryModel::all();
        return view('detail-produk', [
            'produk' => $produk, 
            'category' => $category, 
            'title' => 'Produk | '
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        $category =CategoryModel::all();
        return view('edit-produk', [
            'produk'=> $produk,
            'category' => $category,
            'title' => 'Edit Product'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if($request->file('gambar')){
            $ekstensi = $request->file('gambar')->getClientOriginalExtension();
            $path = $request->file('gambar')->storeAs('gambar', $request->input('nama_produk').".". $ekstensi) ;
            $produk->gambar = $request->input('nama_produk').".". $ekstensi;
        }
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga = $request->input('harga');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->kategori_id = $request->input('kategori_id');

        $produk->save();

        return redirect('product')->with('berhasil', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id)->delete();
        
        return redirect('product')->with('berhasil', 'data berhasil dihapus');
    }
}
