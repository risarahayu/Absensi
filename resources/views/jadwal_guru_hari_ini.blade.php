@extends('layouts.app')
@section('content')



<div class="container mt-3  " style="object-position: center;">

    <h1>Jadwal Hari ini</h1>
    <div class="container">
        <table class="table table-striped text-center table-responsive ">


            <thead>
                <tr>


                    <th scope="col">Tanggal</th>
                    <th scope="col" colspan="3">Waktu</th>
                    <!-- <th scope="col">Nama Guru</th> -->
                    <th scope="col">Nama Siswa</th>

                    <th scope="col">Jenjang Siswa</th>


                    <th scope="col">Alamat</th>
                    <th scope="col">Status Jadwal</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">User Id</th>



                    <!-- <th scope="col">Bulan</th>
                <th scope="col">Tahun</th> -->

                </tr>
            </thead>
            <tbody>

                @if($list_hari_ini->count() == true)


                @foreach($list_hari_ini as $jadwal)



                <tr>



                    <td colspan="" style="font-size: smaller;">{{$jadwal->tanggal->translatedFormat('D, d-F-y')}}</td>

                    <td>{{$jadwal->waktu_mulai}}</td>
                    <td>-</td>

                    <td>{{$jadwal->waktu_selesai}}</td>

                    <td>{{$jadwal->nama_siswa_les}}</td>
                    <td>{{$jadwal->jenjang_siswa}}</td>

                    <td>{{$jadwal->alamat_siswa}}</td>
                    <td>{{$jadwal->status_jadwal}}</td>
                    <td>{{$jadwal->mata_pelajaran_les}}</td>
                    <td>{{$jadwal->nama}}</td>
                    <td>{{$jadwal->user_id}}</td>





                </tr>




                @endforeach
                @else


                <div class="alert alert-warning" role="alert">

                    {{session()->get('tidak_ada_jadwal')}}
                </div>


                @endif












            </tbody>

        </table>

    </div>
    {{$list_hari_ini->links()}}
</div>
@endsection