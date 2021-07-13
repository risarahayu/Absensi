@extends('layouts.app')
@section('content')

<body style="background-color: #2a9d8f;">
    <div class="container" style="background-color:#2a9d8f; border-color:#2a9d8f;">
        <img src="{{asset(Auth::user()->foto_guru)}}" class="rounded-circle mx-auto d-block p-3 img-fluid" style="height:300px; width:300px; object-fit:contain;">
        <div class="container pb-3" style="background-color:#2a9d8f; text-align:center; color:white; border-color:#2a9d8f;">
            <h1>{{$data->nama}}</h1>
        </div>
    </div>
    <div class="container pb-4" style="background-color:white; border-radius : 2%;">
        <!-- <div class="row">
        <div class="col-sm">
            One of three columns
        </div>
        <div class="col-sm">
            One of three columns
        </div>
    </div> -->
        <table class="table mb-4" style="font-size: smaller;">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <td scope="col">{{$data->nama}}</td>
                </tr>
                <tr>
                    <th scope="col">Alamat</th>
                    <td scope="col">{{$data->alamat_user}}</td>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <td scope="col">{{$data->email}}</td>
                </tr>
                <tr>
                    <th scope="col">Status</th>
                    <td scope="col">{{$data->status_user}}</td>
                </tr>
                <tr>
                    <th scope="col">Nomor Hp</th>
                    <td scope="col">{{$data->nomor_Hp}}</td>
                </tr>
                <tr>
                    <th scope="col">Mapel</th>
                    <td scope="col">{{$data->mapel}}</td>
                </tr>
                <tr>
                    <th scope="col">No.Rek</th>
                    <td scope="col">{{$data->nomor_rekening}}</td>
                </tr>
            </thead>
        </table>
        <a class="mb-4" href="{{url("/updateBio/{$data->user_id}/edit")}}"> <button type="button" class="btn btn-primary">Edit Profile</button></a>
    </div>
</body>
@endsection