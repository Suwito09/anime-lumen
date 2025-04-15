<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tayang extends Model
{
    protected $table = 'tayang'; // Nama tabel di database
    protected $fillable = ['anime_id', 'studio_id', 'jadwal_tayang']; // Kolom yang dapat diisi secara massal

    public function anime()
    {
        return $this->belongsTo('App\Models\Anime', 'anime_id');
    }

    public function studio()
    {
        return $this->belongsTo('App\Models\Studio', 'studio_id');
    }
}