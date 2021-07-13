@extends('layouts.app')
@section('content')







<div class="container">
    <h1>Rekap Gaji Guru
    </h1>
</div>
<div class="container">
    <table class="table table-striped">


        <thead>
            <tr>


                <th scope="col">Nama</th>
                <th scope="col">Bulan</th>
                <th scope="col">Tahun</th>

            </tr>
        </thead>
        <tbody>
            @foreach($relasi as $relasis)
            @foreach($relasis as $relasi)

            <tr>



                <td>{{$relasi->created_at->format("M, Y")}}</td>
                <!-- <td>>{{$relasis->created_at}}</td> -->


            </tr>
            @endforeach
            @endforeach
        </tbody>

    </table>
</div>

<!-- tambahan -->






@endsection