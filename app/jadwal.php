<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\FuncCall;

class jadwal extends Model
{
    protected $fillable = [
        'tanggal', 'waktu_mulai', 'jenjang_siswa', 'waktu_selesai', 'nama_siswa_les', 'alamat_siswa', 'status_jadwal', 'mata_pelajaran_les', 'user_id', 'nama', 'nomor_Hp', 'metode_les', 'nomor_siswa'
    ];
    protected $dates = ['tanggal'];


    public function getCreatedatAttribute()
    {
        Carbon::parse($this->attributes['tanggal'])
            ->translatedFormat('1, d F Y');

        // return Carbon::parse($this->attributes['tanggal'])->isoFormat('D MMMM Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function localizedDiffForHumans()
    // {
    //     Carbon::setLocale(jadwal::getLocale());
    //     // Carbon::setLocale(jadwa)
    //     return $this->tanggal->diffForHumans();
    // }
}
