@extends('layouts.app')
@section('content')



<div class="" style="width: 90%;  margin:auto;">
    @if(session()->has('sukses'))

    <div class="alert alert-success" role="alert">
        {{session()->get('sukses')}}
    </div>
    @endif

    @if(session()->has('hapus'))

    <div class="alert alert-success" role="alert">
        {{session()->get('hapus')}}
    </div>
    @endif

    @if(session()->has('gagal'))

    <div class="alert alert-danger" role="alert">
        {{session()->get('gagal')}}
    </div>
    @endif

    @if(session()->has('gagal_guru'))

    <div class="alert alert-danger" role="alert">
        {{session()->get('gagal_guru')}}
    </div>
    @endif


    <div class="row" style="width : 100%; height:110px;">
        <div class="col-md-4">
            <h1 class="mt-0">Jadwal Lesku</h1>
            <a href=" /tambahJadwal">
                <button type="button" class="btn btn-primary">Tambah Jadwal </button>
            </a>

        </div>
        <div class="col-md-4 mt-3" style="">

            <form class="form-inline" method="get" action="{{url("/searchJadwal")}}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn btn-primary my-2 my-sm-0" type="submit">Cari Siswa</button>
            </form>
        </div>
        <div class="col-md-4 mt-3" style="">
            <form class="form-inline" method="get" action="{{url("/searchJadwalGuru")}}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn btn-primary my-2 my-sm-0" type="submit">Cari Guru</button>
            </form>
        </div>
        @if ($jadwal->count())
        <table class="table table-striped table-hover mt-5 text-center">
            <thead class="btn-warning" style="color: white; text-align:center;">
                <tr>
                    <th style="vertical-align: middle; text-align:center;" scope="col" colspan="6">Tanggal</th>


                    <th style="vertical-align: middle;" scope="col" colspan="3">Waktu</th>


                    <!-- <th scope="col">Nama Guru</th> -->
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Jenjang Siswa</th>

                    <th style="vertical-align: middle;" scope="col">Alamat</th>
                    <th style="vertical-align: middle;" scope="col">Status</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th style="vertical-align: middle;" scope="col">Nomor Hp Guru</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">ID Guru</th>
                    <th style="vertical-align: middle; text-align:center;" colspan="3" scope="col">Action</th>
                    <!-- <th scope="col">Bulan</th>
                <th scope="col">Tahun</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $jadwal)
                <tr>

                    <td colspan="6" style="font-size: smaller;">{{$jadwal->tanggal->translatedFormat('D, d-F-y')}}</td>


                    <td>{{$jadwal->waktu_mulai}}</td>
                    <td>-</td>
                    <td>{{$jadwal->waktu_selesai}}</td>

                    <td>{{$jadwal->nama_siswa_les}}</td>
                    <td>{{$jadwal->jenjang_siswa}}</td>

                    <td>{{$jadwal->alamat_siswa}}</td>
                    <td>{{$jadwal->status_jadwal}}</td>
                    <td>{{$jadwal->mata_pelajaran_les}}</td>
                    <td>{{$jadwal->nomor_Hp}}</td>
                    <td>{{$jadwal->nama}}</td>
                    <td>{{$jadwal->user_id}}</td>
                    <td>
                    <td><a href="{{url("/jadwal/{$jadwal->id}/edit")}}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                    <td>
                        <!-- modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin hapus jadwal ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                        <form action="{{url("/jadwal/{$jadwal->id}/hapus")}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->



                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- tambahan -->
    @else
    <div class="container">
        <div class="alert alert-warning mt-5" style="text-align: center;" role="alert">
            Belum ada jadwal bulan ini
        </div>
    </div>
    @endif

    @endsection