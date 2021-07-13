<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $title         = 'Dashboard';
        $status_user = ["guru"];
        // $jumlah_guru    = collect(DB::SELECT("SELECT count('status_user') as jumlah from users where('status_guru'), '=', 'guru'"));
        $jumlah_guru = DB::table('users')
            ->where('users.status_user', '=', 'guru')
            ->count();



        // menghitung jumlah keseuluruhan gaji
        // $jumlah_gaji = DB::table('kategoris')->sum('fee');
        $now = Carbon::now();
        $jumlah_gaji = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->whereMonth('absens.created_at', now()->month)
            ->sum('kategoris.fee');



        $jumlah_absen    = collect(DB::SELECT("SELECT count('absen_id') as jumlah from absens"));
        $label         = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        for ($bulan = 1; $bulan < 13; $bulan++) {
            $chartabsen  = collect(DB::SELECT("SELECT count('absen_id') AS jumlah from absens where month(created_at)='$bulan'"))->first();
            $jumlah_absen_lesku[] = $chartabsen->jumlah;
        }
        // menghitung jumlah pertemuan hari ini
        $pertemuan_hari_ini = DB::table('absens')
            ->whereDay('created_at', now()->day)
            ->count();
        // dd($pertemuan_hari_ini);
        // dd($jumlah_guru);

        $jadwal_hari_ini = DB::table('jadwals')
            ->whereDay('tanggal', now()->day)
            ->count();

        $list_hari_ini = DB::table('jadwals')
            ->whereDay('tanggal', now()->day)
            ->get();

        // absen hari ini
        $absen_hari_ini = DB::table('absens')
            ->whereDay('created_at', now()->day)
            ->get();

        // dd($list_hari_ini);
        return view(
            'dashboard',
            compact('title', 'pertemuan_hari_ini', 'absen_hari_ini', 'list_hari_ini', 'jadwal_hari_ini', 'jumlah_absen', 'jumlah_gaji', 'label', 'chartabsen', 'jumlah_absen_lesku', 'jumlah_guru', 'status_user')
        );
    }


    public function daftarGuru()
    {
        return view('daftar_guru');
    }
}
