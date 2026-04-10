<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table ='galerys';
    
    protected $fillable=[
        'image',
        'nama_toko',
        'rating',
        'review',
    ];
}
