<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function transaksi() {
        return $this->hasMany(Transaksi::class);
    }
}
