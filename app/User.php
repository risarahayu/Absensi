<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'nama', 'email', 'password', 'status_user', 'nomor_Hp', 'mapel', 'nomor_rekening', 'foto_guru', 'alamat_user', 'nama_bank', 'atas_nama'
    ];

    // public function absens()
    // {
    //     return $this->hasMany(Absen::class);
    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function absens()
    {
        return $this->hasMany(Absen::class, 'user_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jadwals()
    {
        return $this->hasMany(jadwal::class, 'user_id');
    }
}
