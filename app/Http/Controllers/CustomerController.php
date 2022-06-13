<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login_customer');
    }

    public function register(){
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $customer = new Customer();
        $password = md5($request->input('password'));
        if($customer->where('email', $request->input('email'))->where('password', $password)->exists()){
            $_SESSION['email']= $request->input('email');
            return redirect('landing');
        } else {
            if($customer->where('email', $request->input('email'))->exists()){
                return redirect('/Login')->with('Failed','Password Salah');
            } else {
                return redirect('/Login')->with('Failed', 'Email Tidak Terdaftar');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email|unique:customer',
            'password' => 'required|min:5',
            'no_hp' => 'required|max:255',
            'alamat_lengkap' => 'required|max:255'
        ]);
        $data['password'] = md5($data['password']);

        Customer::create($data);

        return redirect('/Login')->with('success', 'Daftar Berhasil');
    }

    public function destroy($id)
    {
        //
    }
}
