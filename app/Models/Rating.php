<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesananDetail;

class Rating extends Model
{
    use HasFactory;

    public function pesanan(){
        return $this->hasMany(PesananDetail::class, 'name', 'id');
    }

    public function user(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
