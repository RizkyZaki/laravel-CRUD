<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CategoryModel;
use App\Models\Produk;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $category = CategoryModel::count();
        $produk = Produk::count();
        $admin = Admin::count();
        return view('dashboard', [
        'title' => 'Dashboard Page',
        'category' => $category,
        'produk' => $produk,
        'admin' => $admin
    ]);
    }
}
