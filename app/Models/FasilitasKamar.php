<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKamar extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_kamars';
    protected $fillable = [
        'id_kamar','nama_fasilitas',
    ];

    public function faskam()
    {
        return $this->belongsTo('App\Models\Kamar', 'id_kamar');

    }
}
