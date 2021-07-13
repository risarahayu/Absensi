<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit($user_id)
    {


        $data = User::find($user_id);
        return view('formUpdateProfile', compact('data'));
    }

    public function update(Request $request, $user_id)
    {



        if (request()->has('foto_guru')) {
            $foto = request()->file('foto_guru');
            $foto_nama = $foto->getClientOriginalName();
            $foto_patch = public_path('/image/');
            $foto->move($foto_patch, $foto_nama);


            $data = User::find($user_id);
            $data->nama = $request->input('nama');
            $data->email = $request->input('email');
            // 'foto_guru' => '/image/' . $foto_nama,
            $data['foto_guru'] = '/image/' . $foto_nama;

            // $data->foto_guru = $request->input('foto_guru');
            $data->nomor_Hp = $request->input('nomor_Hp');
            $data->mapel = $request->input('mapel');
            $data->alamat_user = $request->input('alamat_user');


            $data->nomor_rekening = $request->input('nomor_rekening');
            $data->atas_nama = $request->input('atas_nama');
            $data->nama_bank = $request->input('nama_bank');
            // $data->password_confirmation = $request->input('password_confirmation');
            // $data->password = $request->input('password');





            $data->save();
        } else {
            $data = User::find($user_id);
            $data->nama = $request->input('nama');
            $data->email = $request->input('email');
            // 'foto_guru' => '/image/' . $foto_nama,

            // $data->foto_guru = $request->input('foto_guru');
            $data->nomor_Hp = $request->input('nomor_Hp');
            $data->mapel = $request->input('mapel');
            $data->alamat_user = $request->input('alamat_user');

            $data->atas_nama = $request->input('atas_nama');
            $data->nama_bank = $request->input('nama_bank');
            $data->nomor_rekening = $request->input('nomor_rekening');
            // $data->password_confirmation = $request->input('password_confirmation');
            // $data->password = $request->input('password');





            $data->save();
        }
        // dd($id);
        return redirect('/profile');
    }

    public function show()
    {



        $data = Auth::user();
        return view('profile', ['data' => $data]);

        // $data = User::get();

        // return view('riwayat_absen', ['absens' => $absens]);
    }
}
