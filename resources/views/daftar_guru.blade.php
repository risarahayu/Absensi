@extends('layouts.app')
@section('content')





<nav class="navbar navbar-light bg-light" style="display: flex;align-items: center;justify-content: center;">
    <form class="form-inline" method="get" action="{{url("/searchGuru")}}">
        <input class="form-control mr-sm-2" type="search" placeholder="Masukan Nama Guru" aria-label="Search" name="query">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<div class="container mt-3">

    <div class="row">
        @if ($daftars->count())

        @foreach($daftars as $daftar)
        <div class="col-md-4 mt-5">
            <div class="card rounded" style="width: fit-content;">
                <img src="{{asset($daftar->foto_guru)}}" class="" max-width="30%" alt="..." style="height:300px; width:300px; object-position:center; object-fit:contain;">
                <div class="card-body">
                    <h2>{{$daftar->nama}}</h2>
                    <hr style="background-color:yellow;">
                    <p class="card-text">
                        <small>User ID : {{$daftar->user_id}}</small><br>
                        <small>Email : {{$daftar->email}}</small><br>
                        <small>Nomor Hp : {{$daftar->nomor_Hp}}</small><br>
                        <small>Mata Pelajaran : {{$daftar->mapel}}</small><br>
                        <small>Nomor Rekening : {{$daftar->nomor_rekening}}</small><br>
                        <small>Nama Bank : {{$daftar->nama_bank}}</small><br>
                        <small>Atas Nama : {{$daftar->atas_nama}}</small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="container">
            <div class="alert alert-warning text-center" role="alert">
                Nama guru yang Anda cari tidak ditemukan
            </div>
        </div>
        @endif
    </div>

    {{$daftars->links()}}


    @endsection