<?php

namespace App\Http\Controllers;

use App\Absen;
use App\User;
use App\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AbsenController extends Controller
{
    public function index()
    {
        $absens = Absen::whereMonth('absens.created_at', now()->month)->latest()->paginate(20);
        session()->flash('tidak_ada_absen', 'Anda belum memiliki riwayat absen bulan ini');
        return view('riwayat_absen', ['absens' => $absens]);
    }
    public function store(Request $request)
    {


        $this->validate($request, [
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required',
            'foto_absen' => 'required',
            'metode_les' => 'required',
            'kategori_id' => 'required',
            'mata_pelajaran' => 'required',
            'materi_ajar' => 'required',

        ]);

        // tambahan



        $absen = $request->all();




        if (request()->has('foto_absen')) {
            $foto = request()->file('foto_absen');
            $foto_nama = $foto->getClientOriginalName();
            $foto_patch = public_path('/image/');
            $foto->move($foto_patch, $foto_nama);

            // return Absen::create([
            //     'foto_absen' => '/image/' . $foto_nama

            // ]);
            // $absen['kategori_id'] = $request->kategori_id;
            // $absen['kategori_id'] = $request->kategori_id;

            $absen['foto_absen'] = '/image/' . $foto_nama;
            $absen = auth()->user()->absens()->create($absen);
        }

        session()->flash('sukses', 'Absen berhasil dibuat');

        return redirect('/riwayat')->with('success', 'absen sudah masuk');
    }

    public function new_absen()
    {

        return view('absen', [
            'kategoris' => kategori::get()
        ]);
    }





    public function gaji()
    {


        // dd($akun);
        // dd($akun);
        // $gaji = App\kategori::sum('fee');
        // $sum = Absen::sum('fee');

        // coba

        // dd($gaji);



        $sum = DB::table('absens')
            ->leftJoin('users', 'absens.user_id', '=', 'users.user_id')
            ->get();


        $sum = DB::table('absens')
            ->rightJoin('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
            ->whereMonth('absens.created_at', now()->month)
            ->get();
        // ->select('absens.kategori_id', 'absens.user_id', 'kategori.fee')
        // ->where('absens.user_id', '=', '$sum')
        // ->select('absens.kategori_id')
        // ->sum('kategoris.fee')
        // ->where('absens.user_id', '=', '$akun')

        // ->SUM('kategoris.fee');


        $akun = Auth::user()->user_id;
        // dd($akun);

        // $akun = DB::table('users')
        //     ->where('user_id', '==', '$akun')
        //     ->get();

        // $filtered = $sum->where('user_id', '$akun');
        $filtered = $sum->where('user_id', $akun);
        $jumlah = $filtered->sum('fee');

        return view('gaji', compact('jumlah'));
        // dd($jumlah);




        $sum = DB::table('absens')
            ->where('absens.user_id', '=', '$akun')
            // ->select('absens.kategori_id')
            ->get();


        // ->where('absen.user_id', '=', '$sum');
        // ->where('user_id', '=', 'user_id')
        // ->find($user_id->id)
        // ->WHERE('user_id', '=', '$akun')
        // ->where('user_id', '=', 'Auth::user()')
        // ->where('fee', '=', 'user_id')
        // ->sum('kategoris.fee');





        // $sum = DB::table('kategoris')
        //     ->join('absens', 'absens.id', '=', 'users.absens_id')
        //     ->join('users', 'users.id', '=', 'absens.user_id')
        //     ->sum('kategoris.fee')
        //     ->get();



        // berhasil
        // $sum = DB::table('absens')
        //     ->join('kategoris', 'absens.kategori_id', '=', 'kategoris.id')
        //     ->sum('kategoris.fee');


        // dd($sum);
        return view('gaji', compact('sum'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('auth.login');
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
