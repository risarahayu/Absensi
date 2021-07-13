<?php

namespace App\Http\Controllers;

use App\Absen;
use Carbon\Carbon;
use App\kategori;
use Illuminate\Support\Facades\Auth;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class riwayatAbsenGuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function riwayatAbsen()
    {


        // $riwayats = DB::table('absens')
        //     ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
        //     ->get();


        // $riwayats = DB::table('absens')
        //     ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
        //     ->get();


        $riwayats = Absen::whereMonth('absens.created_at', now()->month)
            ->latest()->paginate(10);


        session()->flash('tidak_ada_absen', 'Anda belum memiliki Riwayat Absen');
        return view('riwayat_absen_guru', ['riwayats' => $riwayats]);
    }

    public function rekapGaji()
    {


        $relasi = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->get();


        $relasi = DB::table('absens')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->get();


        $relasi = Absen::whereYear('absens.created_at', now()->year)
            ->whereMonth('absens.created_at', now()->month)
            ->select('absens.user_id')
            ->groupBy('absens.user_id')
            // ->first();
            ->get();

        // dd($relasi);
        // $relasi['absens'] = Absen::get()
        //     ->groupBy(function ($val) {
        //         return Carbon::parse($val->created_at)->format('F');
        //     });


        return view('rekap_gaji_guru', compact('relasi'));
    }



    public function detail($userId)
    {



        $riwayats = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->get();


        $riwayats = DB::table('absens')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->get();



        $riwayats = Absen::where('user_id', $userId)
            ->whereYear('absens.created_at', now()->year)
            ->whereMonth('absens.created_at', now()->month)
            ->get();



        $jumlah = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->where('absens.user_id', $userId)
            ->whereYear('absens.created_at', now()->year)
            ->whereMonth('absens.created_at', now()->month)
            ->sum('kategoris.fee');
        // $jumlah = $riwayats->sum('kategoris.fee');


        // $riwayats = DB::table('absens')
        //     ->where('user_id', $userId)
        //     ->get();
        // dd($riwayats);
        // return view('detail_absen_guru', ['riwayats' => $riwayats]);
        // dd($jumlah);
        return view('detail_absen_guru', compact('riwayats', 'jumlah'));
    }

    public function detailBulan(Request $request, $userId)
    {


        $tahun = $request->get('Tahun');
        $bulan = $request->get('Bulan');
        $id = $request->get('user_id');


        $riwayats = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->get();


        $riwayats = DB::table('absens')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->get();



        // $riwayats = Absen::where('user_id', $userId)
        //     ->whereYear('absens.created_at', '=', $cari_tahun)
        //     ->whereMonth('absens.created_at', '=', $query)
        //     ->get();

        $riwayats = Absen::whereYear('absens.created_at', $tahun)
            ->whereMonth('absens.created_at', $bulan)
            ->where('absens.user_id', $id)
            ->get();


        $ambil = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->get();


        $ambil = DB::table('absens')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->get();

        $ambil = Absen::where('user_id', $userId)
            ->whereYear('absens.created_at', now()->year)
            ->whereMonth('absens.created_at', now()->month)
            ->first();




        $jumlah = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->where('absens.user_id', $userId)
            ->whereYear('absens.created_at', now()->year)
            ->whereMonth('absens.created_at', now()->month)
            ->sum('kategoris.fee');

        // dd($ambil);

        return view('detail_absen_guru_bulan', compact('riwayats', 'jumlah', 'ambil'));
    }

    public function cari_gaji_bulanan(Request $request)
    {
        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');
        $id = $request->get('user_id');

        $riwayats = Absen::whereYear('absens.created_at', $tahun)
            ->whereMonth('absens.created_at', $bulan)
            ->where('absens.user_id', $id)
            ->get();

        $jumlah = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->where('absens.user_id', $id)
            ->whereYear('absens.created_at', $tahun)
            ->whereMonth('absens.created_at', $bulan)
            ->sum('kategoris.fee');

        // dd($jumlah);
        return view('search_bulan', compact('riwayats', 'jumlah', 'bulan', 'tahun'));
    }






    public function coba()
    {
        $posts['absens'] = Absen::select('created_at')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('F');
            });




        // $posts = Carbon::now();
        // dd($posts);
        // ............ 
        return view('coba', ['posts' => $posts]);
    }

    public function detailAbsen($id)
    {
        $detailAbsen = Absen::where('id', $id)
            ->get();
        // dd($detailAbsen);

        return view('detailAbsen', ['detailAbsen' => $detailAbsen]);
    }

    public function cetak($id)
    {
        $cetakAbsen = Absen::where('user_id', $id)
            ->get();

        $jumlah = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->where('absens.user_id', $id)
            ->whereYear('absens.created_at', now()->year)
            ->whereMonth('absens.created_at', now()->month)
            ->sum('kategoris.fee');
        // dd($cetakAbsen);

        return view('cetak', compact('cetakAbsen', 'jumlah'));
    }

    public function lihat()
    {
        return view('lihat');
    }

    public function lihat1(Request $request)
    // public function lihat1(Request $request, $tahun)

    {


        $query = $request->get('query');
        $cari_tahun = $request->get('tahunn');

        // dd($query);

        $relasi = Absen::whereYear('absens.created_at', '=', $cari_tahun)
            ->whereMonth('absens.created_at', '=', $query)
            // ->groupBy('absens.user_id')
            ->get();
        // $absens = Absen::where("tanggal", "like", "%$query%")->latest()->paginate(50);



        // return $query;


        return view('lihat1', compact('relasi', 'cari_tahun', 'query'));
        // return view('rekap_gaji_guru', compact('relasi', 'cari_tahun', 'query'));
    }
}
