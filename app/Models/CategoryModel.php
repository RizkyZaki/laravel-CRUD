<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function product() {
        return $this->hasMany(Produk::class, "kategori_id");
    }
}
