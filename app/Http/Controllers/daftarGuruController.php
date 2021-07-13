<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class daftarGuruController extends Controller
{
    public function daftarGuru()
    {
        $daftars = User::where('status_user', '=', 'guru')->paginate(5);
        return view('daftar_guru', ['daftars' => $daftars]);
    }
}
