<?php

namespace App;

use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'nama_siswa', 'alamat_siswa', 'foto_absen', 'metode_les', 'mata_pelajaran', 'materi_ajar', 'kategori_id', 'created_at',
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
