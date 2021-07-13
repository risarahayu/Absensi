<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'status_user' => ['required', 'string', 'max:255'],
            'nomor_Hp' => ['required', 'string'],
            'foto_guru' => ['required', 'image|mimes:jpg, jpeg, png'],
            'foto_guru' => ['required', 'image', 'mimes:jpg, jpeg, png'],

            'mapel' => ['required', 'string', 'max:255'],
            'nama_bank' => ['required', 'string', 'max:255'],
            'atas_nama' => ['required', 'string', 'max:255'],
            'nomor_rekening' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $nm = $data->foto_guru;
        // $namaFoto = $nm->getClientOriginalName();
        if (request()->has('foto_guru')) {
            $foto = request()->file('foto_guru');
            $foto_nama = $foto->getClientOriginalName();
            $foto_patch = public_path('/image/');
            $foto->move($foto_patch, $foto_nama);


            return User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status_user' => $data['status_user'],
                'nomor_Hp' => $data['nomor_Hp'],
                'alamat_user' => $data['alamat_user'],

                // 'foto_guru' => $data['foto_guru'],
                'foto_guru' => '/image/' . $foto_nama,
                'mapel' => $data['mapel'],
                'nomor_rekening' => $data['nomor_rekening'],
                'nama_bank' => $data['nama_bank'],
                'atas_nama' => $data['atas_nama'],
            ]);
            session()->flash('sukses', 'Selamat Anda berhasil registrasi');
        }
    }
}
