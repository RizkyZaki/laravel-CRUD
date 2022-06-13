<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Auth_admin extends Controller
{

    public function index() {
        return view('admin_list', [
            'admin' => Admin::all(),
            'title' => 'Admin List'
        ]);
    }

    public function create() {
        return view('create_admin', [
            'title' => 'Add Admin'
        ]);
    }

    public function Login() {
        return view('login');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:5'
        ]);
        $validatedData['password'] = md5($validatedData['password']);

        Admin::create($validatedData);

        return redirect('/admin')->with('success', 'Daftar Berhasil, Silahkan login untuk masuk ke dashboard');
    }

    public function LoginStore(Request $request) {
        // $data = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if(Auth::attempt($data)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // }
        $admin = new Admin();
        $password = md5($request->input('password'));
        if($admin->where('email', $request->input('email'))->where('password', $password)->exists()){
            $_SESSION['email']= $request->input('email');
            return redirect('dashboard');
        } else {
            if($admin->where('email', $request->input('email'))->exists()){
                return redirect('/LoginAdmin')->with('Failed', 'Password Salah');
            } else {
                return redirect('/LoginAdmin')->with('Failed', 'Email Tidak Terdaftar');
            }
        }

        
    }
}
