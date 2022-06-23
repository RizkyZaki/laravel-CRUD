<?php

namespace App\Models;

use App\Models\CategoryModel;
use App\Models\Transaksi_detail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(CategoryModel::class, 'kategori_id');
    }

    public function transaksi_detail() {
        return $this->hasMany(Transaksi_detail::class, 'produk_id');
    }
}
