<?php

namespace App;

use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nik',
        'name',
        'email',
        'password',
        'telp',
        'jenis_kel',
        'level',
        'alamat',
        'rt',
        'rw',
        'kode_pos',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        // 'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(Village::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(District::class, 'village_id', 'id');
    }
}
