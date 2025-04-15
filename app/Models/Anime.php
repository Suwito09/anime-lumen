<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $table = 'anime'; // Nama tabel di database
    protected $fillable = ['judul', 'genre']; // Kolom yang dapat diisi secara massal

}