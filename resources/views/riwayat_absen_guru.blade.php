@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="width : 100%; height:110px;">
        <div class="col-md-4 pt-4">
            <h1>Riwayat Guru
            </h1>
        </div>
        <nav class="navbar navbar-light bg-light" style="display: flex;align-items: center;justify-content: center;">
            <form class="form-inline" method="get" action="{{url("/searchRiwayat")}}">
                <input class="form-control mr-sm-2" type="search" placeholder="Masukan Nama Siswa" aria-label="Search" name="query">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
    </div>
</div>

<div class="container mt-5">
    <table class="table table-striped table-hover">


        <thead class="btn-warning" style="color: white;">
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Nama Siswa</th>

                <th scope="col">Fee</th>
                <th scope="col">Action</th>


            </tr>
        </thead>
        <tbody>
            @if ($riwayats->count())
            @foreach($riwayats as $riwayat)
            <tr>
                <td>{{$riwayat->created_at}}</td>
                <td>{{$riwayat->author['nama']}}</td>
                <td>{{$riwayat->nama_siswa}}</td>

                <td>{{$riwayat->kategori->fee}}</td>
                <td><a href="{{url("/detailAbsen/{$riwayat->id}")}}"><button type="button" class="btn btn-warning">Detail</button></a></td>

            </tr>
            @endforeach
            @else
            <div class="alert alert-warning" role="alert">
                Belum ada riwayat absen
            </div>
            @endif
        </tbody>

    </table>


    {{$riwayats->links()}}
</div>



@endsection