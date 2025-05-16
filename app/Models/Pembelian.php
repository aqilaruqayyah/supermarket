<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = ['pembeli_id', 'produk_id', 'penjual_id', 'jumlah', 'total_harga'];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function penjual()
    {
        return $this->belongsTo(Penjual::class);
    }
}
