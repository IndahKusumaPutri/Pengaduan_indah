<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $fillable = ['tgl_tanggapan','tanggapan','nik'];
}
