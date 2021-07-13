@extends('layouts.app')
@section('content')






<div class="container">
    <div class="row" style="width : 100%; height:110px;">
        <div class="col-md-4">
            <h1>Rekap Gaji Guru
            </h1>
        </div>
        <!-- <div class="col-md-4" style="padding-top:4%;">

            <form class="form-inline" method="get" action="{{url("/searchRekap")}}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn btn-primary my-2 my-sm-0" type="submit">Cari Guru</button>
            </form>
        </div> -->
    </div>
</div>


<div class="container">
    <form class="form-inline" method="get" action="{{url("/lihat1")}}">
        <input class="form-control mr-sm-2" type="search" placeholder="Bulan" aria-label="Search" name="query">
        <input class="form-control mr-sm-2" type="search" placeholder="Tahun" aria-label="Search" name="tahunn">

        <button class="btn btn btn-primary my-2 my-sm-0" type="submit">Cari Absen</button>
    </form>
    <table class="table table-striped table-hover mt-5">


        <thead class="btn-warning" style="color: white; text-align:center;">
            <tr>


                <th scope="col">Nama</th>
                <th scope="col">Action</th>

                <!-- <th scope="col">Bulan</th>
                <th scope="col">Tahun</th> -->

            </tr>
        </thead>
        <tbody style="text-align: center;">
            @if ($relasi->count())
            @foreach($relasi as $relasis)

            <tr>

                <td>{{$relasis->author['nama']}}</td>

                <td><a href="/detail/{{$relasis->user_id}}"><button class="btn btn-warning">Detail</button></a></td>



            </tr>
            @endforeach
            @else
            <div class="alert alert-warning" role="alert">
                Belum ada rekap gaji guru
            </div>
            @endif

        </tbody>

    </table>
</div>

<!-- tambahan -->






@endsection