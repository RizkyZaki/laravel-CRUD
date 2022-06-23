<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ApiController extends Controller
{
    public function produk() {
        $produk = Produk::all();

        return response()->json($produk);
    }

}
