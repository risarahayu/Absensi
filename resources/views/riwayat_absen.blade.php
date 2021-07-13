@extends('layouts.app', ['title'=>'Riwayat Absen'])
@section('content')
<nav class="navbar navbar-light bg-light" style="display: flex;align-items: center;justify-content: center;">
    <form class="form-inline" method="get" action="{{url("/searchAbsen")}}">
        <input class="form-control mr-sm-2" type="search" placeholder="Masukan Nama Siswa" aria-label="Search" name="query">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
    </form>
</nav>


<!-- {{$user_id = Auth::user()->user_id}} -->
<div class="container mt-5">



    @if(session()->has('sukses'))

    <div class="alert alert-success" role="alert">
        {{session()->get('sukses')}}
    </div>
    @endif
    <h4> Riwayat Absen</h4>
    @if (auth()->user()->absens->count())

    @if($absens->count())


    @foreach($absens as $absen)
    @if(auth()->user()->is($absen->author))

    <!-- cari -->



    <div class="text-secondary">

    </div>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md" style="height:30%; width:fit-content;">
                <img src="{{asset($absen->foto_absen)}}" class="img-fluid" width="50%" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$absen->nama_siswa}}</h5>
                    <p class="card-text">{{$absen->created_at}}</p>

                    <p class="card-text"><small class="text-muted">
                            Rp. {{number_format($absen->kategori->fee, 0, ',', '.')}}

                        </small></p>

                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @else
    <div class="alert alert-warning" role="alert">


        Absen yang Anda cari tidak ada


    </div>

    @endif
    @else
    <div class="alert alert-warning" role="alert">


        {{session()->get('tidak_ada_absen')}}


    </div>

    @endif

    <a href="/gaji">
        <button type="button" class="btn" style="background-color: #FDD72A; ">Cek Gaji</button>
    </a>

    {{$absens->links()}}
</div>


@endsection