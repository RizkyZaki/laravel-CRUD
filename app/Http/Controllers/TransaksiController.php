<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi_detail;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {
        return view('report', [
            'title' => 'Laporan Transaksi',
            'customer' => Transaksi::all()
        ]);
    }

    public function show($id) 
    {
        $detail = Transaksi_detail::find($id);
        return view('report_detail', [
            'detail' => $detail,
            'title' => 'Detail Transaksi'
        ]);
    }
}
