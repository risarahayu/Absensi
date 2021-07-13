@extends('layouts.app')
@section('content')










<div class="container border" style="width: 100%;">


    <h1>Jadwal Lesku
        @if(auth()->user()->status_user=="admin")
        <a href="/tambahJadwal"><button type="button" class="btn btn-primary">Tambah Jadwal </button></a>
        @endif
    </h1>







    <table class="table table-striped text-center table-responsive" style="width: 100%;">


        <thead>
            <tr>


                <th scope="col" width="180px">Tanggal</th>
                <th scope="col" colspan="3">Waktu</th>
                <!-- <th scope="col">Nama Guru</th> -->
                <th scope="col">Nama Siswa</th>
                <th scope="col" width="200px">Jenjang Siswa</th>

                <th scope="col" width="200px">Alamat</th>
                <th scope="col">Status Jadwal</th>
                <th scope="col">Mata Pelajaran</th>




                <!-- <th scope="col">Bulan</th>
                <th scope="col">Tahun</th> -->

            </tr>
        </thead>
        <tbody>



            @if($list_hari_ini->count())

            <div class="alert alert-warning" role="alert">
                {{session()->get('cek')}}
            </div>

            @endif








            @if($jadwal_guru->count()== true)


            @foreach($jadwal_guru as $jadwal)


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






            </tr>


            @endforeach
            @else
            <div class="alert alert-warning" role="alert">

                {{session()->get('cekjadwal')}}
            </div>

            @endif


        </tbody>

    </table>
    {{$jadwal_guru->links()}}
</div>


<!-- tambahan -->






@endsection