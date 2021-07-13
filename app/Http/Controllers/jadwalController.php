<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class jadwalController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {

        $jadwal = jadwal::with('user')
            ->latest()
            // ->whereMonth('tanggal', now()->month)
            ->get();



        // $jadwal =  Carbon::parse()->isoFormat('dddd, D MMM Y');

        // $time = Carbon::parse()->isoFormat('dddd, D MMM Y');
        // dd($time);

        return view('jadwal', compact('jadwal'));
    }
    public function add()
    {


        return view('tambah_jadwal');
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'tanggal' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'nama_siswa_les' => 'required',
            'alamat_siswa' => 'required',
            'status_jadwal' => 'required',
            'mata_pelajaran_les' => 'required',
            'nama' => 'required',
            'nomor_Hp' => 'required',
            'user_id' => 'required',
            'jenjang_siswa' => 'required',
            'metode_les' => 'required',
            'nomor_siswa' => 'required',
        ]);

        $cek = jadwal::wheredate('tanggal', $request->input('tanggal'))
            ->where('nama_siswa_les', $request->input('nama_siswa_les'))
            ->where('waktu_mulai', $request->input('waktu_mulai'))
            ->count();

        $cek_guru = jadwal::wheredate('tanggal', $request->input('tanggal'))
            ->where('nama', $request->input('nama'))
            ->where('waktu_mulai', $request->input('waktu_mulai'))
            ->count();


        if ($cek == true) {
            session()->flash('gagal', 'Jadwal gagal  dibuat karena jadwal siswa terbentur');
        } elseif ($cek_guru == true) {

            session()->flash('gagal_guru', 'Jadwal gagal  dibuat karena jadwal guru terbentur');
        } else {

            $jadwal = new jadwal([
                'tanggal' => $request->input('tanggal'),
                // 'tanggal' => $request->input->Carbon::now('tanggal')->isoFormat('dddd, D MMM Y'),

                'waktu_mulai' => $request->input('waktu_mulai'),
                'waktu_selesai' => $request->input('waktu_selesai'),
                'nama_siswa_les' => $request->input('nama_siswa_les'),
                'alamat_siswa' => $request->input('alamat_siswa'),
                'status_jadwal' => $request->input('status_jadwal'),
                'mata_pelajaran_les' => $request->input('mata_pelajaran_les'),
                'nama' => $request->input('nama'),
                'nomor_Hp' => $request->input('nomor_Hp'),
                'user_id' => $request->input('user_id'),
                'jenjang_siswa' => $request->input('jenjang_siswa'),
                'metode_les' => $request->input('metode_les'),
                'nomor_siswa' => $request->input('nomor_siswa'),


            ]);


            $jadwal->save();

            session()->flash('sukses', 'Jadwal berhasil dibuat');
        }




        return redirect('jadwal');
    }

    public function time()
    {
        return view('coba1');
    }


    public function edit($id)
    {
        $jadwal = jadwal::find($id);
        // dd($id);
        return view('editJadwal', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = jadwal::find($id);
        $jadwal->tanggal = $request->input('tanggal');
        $jadwal->waktu_mulai = $request->input('waktu_mulai');
        $jadwal->waktu_selesai = $request->input('waktu_selesai');
        $jadwal->jenjang_siswa = $request->input('jenjang_siswa');
        $jadwal->nama_siswa_les = $request->input('nama_siswa_les');
        $jadwal->alamat_siswa = $request->input('alamat_siswa');
        $jadwal->status_jadwal = $request->input('status_jadwal');
        $jadwal->mata_pelajaran_les = $request->input('mata_pelajaran_les');
        $jadwal->user_id = $request->input('user_id');
        $jadwal->nama = $request->input('nama');
        $jadwal->nomor_Hp = $request->input('nomor_Hp');
        $jadwal->metode_les = $request->input('metode_les');
        $jadwal->nomor_siswa = $request->input('nomor_siswa');



        $jadwal->save();
        // dd($id);
        return redirect('/jadwal');
    }

    public function getAllFields(Request $request)
    {

        try {
            $getFields = User::where('user_id', $request->user_id)->first();
            // here you could check for data and throw an exception if not found e.g.
            // if(!$getFields) {
            //     throw new \Exception('Data not found');
            // }
            return response()->json($getFields, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function jadwal_sesuai_guru()
    {

        // $id = auth()->user()->user_id;
        // $jadwal_guru = jadwal::with('user')->where('user_id', $id)->get();


        $akun = Auth::user()->user_id;
        $jadwal_guru = jadwal::where('user_id', $akun)->latest()->paginate(20);

        // $jadwal_guru = jadwal::with('user')->get();

        // $id = auth()->user()->user_id;



        // $jadwal_guru = jadwal::with('user')->get();


        // dd($jadwal_guru);

        // return view('jadwal_guru', compact('jadwal_guru', 'list_hari_ini'));


        $list_hari_ini = DB::table('jadwals')
            ->where('user_id', $akun)
            ->whereDay('tanggal', now()->day)
            ->get();



        session()->flash('cek', 'Anda memiliki jadwal hari ini! Silahkan cek jadwal hari ini');
        session()->flash('cekjadwal', 'Anda belum memiliki jadwal Bulan ini!');
        return view('jadwal_guru',  compact('jadwal_guru', 'list_hari_ini'));
    }
    public function jadwalHariIni()
    {
        // $list_hari_ini = DB::table('jadwals')
        //     ->whereDay('tanggal', now()->day)
        //     ->get();

        $akun = Auth::user()->user_id;


        $list_hari_ini = jadwal::whereDay('tanggal', now()->day)
            ->where('user_id', $akun)
            ->latest()
            ->paginate(20);



        session()->flash('tidak_ada_jadwal', 'Anda belum memiliki jadwal hari ini');

        return view('jadwal_guru_hari_ini', compact('list_hari_ini'));
    }
    public function hapus($id)
    {
        DB::table('jadwals')->where('id', $id)->delete();
        // return view('jadwal')->with('status', 'berhasil');
        session()->flash('hapus', 'Jadwal berhasil dihapus');
        return redirect()->back()->with('');
        // return "delete";
    }
}
