<?php

namespace App\Http\Controllers;

use App\Absen;
use App\jadwal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function searchAbsen(Request $request)
    {
        $query = $request->get('query');
        $absens = Absen::where("nama_siswa", "like", "%$query%")->latest()->paginate(50);
        // dd($absens);

        return view('riwayat_absen', compact('absens'));
        // return $query;
    }

    public function searchJadwal(Request $request)
    {
        $query = $request->get('query');
        $jadwal = jadwal::where("nama_siswa_les", "like", "%$query%")->latest()->paginate(5);
        // dd($jadwal);

        return view('jadwal', compact('jadwal'));
        // return $query;
    }

    public function searchJadwalGuru(Request $request)
    {
        $query = $request->get('query');
        $jadwal = jadwal::where("nama", "like", "%$query%")->latest()->paginate(5);
        // dd($jadwal);

        return view('jadwal', compact('jadwal'));
        // return $query;
    }

    public function searchDaftarGuru(Request $request)
    {
        $query = $request->get('query');
        $daftars = User::where("nama", "like", "%$query%")->latest()->paginate(5);
        // dd($jadwal);

        return view('daftar_guru', compact('daftars'));
        // return $query;
    }

    public function searchRiwayat(Request $request)
    {
        $query = $request->get('query');
        $riwayats = Absen::where("nama_siswa", "like", "%$query%")->latest()->paginate(5);
        // dd($jadwal);

        return view('riwayat_absen_guru', compact('riwayats'));
        // return $query;
    }
}
