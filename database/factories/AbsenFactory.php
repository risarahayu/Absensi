<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Absen;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Absen::class, function (Faker $faker) {
    return [
        'nama_siswa' => $faker->sentence(),
        'alamat_siswa' => $faker->sentence(),
        'slug' => \Str::slug($faker->sentence()),
        'jenjang_siswa' => $faker->sentence(),
        'metode_les' => $faker->sentence(),
        'mata_pelajaran' => $faker->sentence(),
        'materi_ajar' => $faker->sentence(),
        'status_les' => $faker->sentence(),
    ];
});
