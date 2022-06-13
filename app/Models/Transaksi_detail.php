<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_detail extends Model
{
    use HasFactory;

    protected $table = 'transaksi_detail';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function transaksi() {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
