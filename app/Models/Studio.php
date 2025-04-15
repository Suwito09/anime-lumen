<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = 'studio'; // Nama tabel di database
    protected $fillable = ['studio_name', 'studio_location']; // Kolom yang dapat diisi secara massal
}