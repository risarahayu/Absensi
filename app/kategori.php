<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public function Absens()
    {
        return $this->hasMany(Absen::class);
    }
}
