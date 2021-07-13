@extends('layouts.app')
@section('content')



<div class="card text-center" style="width: 20rem; margin:auto;">
    <img src="{{ ('foto png/gaji.png') }}" class="card-img-top" alt="...">
    <div class="card-body">

        <h1 class="card-text"> Rp. {{number_format($jumlah, 0, ',', '.')}}</h1>
    </div>
</div>



@endsection