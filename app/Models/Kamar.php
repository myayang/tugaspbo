<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{

    use HasFactory;
    protected $table = 'kamars';
    protected $fillable = [
        'id','tipe_kamar','jml_kamar','harga','gambar'
    ];

    public function kamarfas()
    {
        return $this->hasMany('App\FasilitasKamar');
    }
}
