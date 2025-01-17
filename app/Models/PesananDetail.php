<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Rating;

class PesananDetail extends Model
{
    use HasFactory;

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }

    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    public function rating(){
        return $this->belongsTo(Rating::class, 'name', 'id');
    }
}
