<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Transaksi_detail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $guarded = ['id'];
    public $timestamps = false;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function transaksi_detail() {
        return $this->hasMany(Transaksi_detail::class, 'transaksi_id');
    }
}
