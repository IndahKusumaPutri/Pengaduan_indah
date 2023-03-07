<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengaduanImage extends Model
{
    public $timestamps = false;
    protected $table = 'pengaduanimage';
    protected $fillable = ['pengaduan_unique_id','image'];
}
