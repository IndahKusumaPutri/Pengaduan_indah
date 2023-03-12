<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';
    
    protected $fillable = [
        'tgl_pengaduan', 
        'nik', 
        'isi_laporan', 
        'foto',
        'status'
    ];
    // protected $timestamps = 'false';
}
