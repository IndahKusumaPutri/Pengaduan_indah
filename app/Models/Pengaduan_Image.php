<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan_Image extends Model
{
    protected $table = "pengaduan_images";
    protected $fillable = ['pengaduan_unique_id', 'foto'];
}
