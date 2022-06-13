<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\Produk;
use Illuminate\Http\Request;

class Landing_Controller extends Controller
{
    public function index() {
        return view('landing-page', [
        'title' => 'Ecommerce | Landing Page',
        'produk' => Produk::all(),
        'category' => CategoryModel::all()
    ]);
    }
}
