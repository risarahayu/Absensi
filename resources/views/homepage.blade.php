@extends('layouts.app')
@section('content')

@if(session()->has('sukses'))

<div class="alert alert-success" role="alert">
    {{session()->get('sukses')}}
</div>
@endif

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('icon/DSC00114.JPG') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('icon/DSC00428.JPG') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('icon/DSC00565.JPG') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- <div class="container mt-4"> -->

<!-- <div class="row text-center" style="color: white; background-color:#FEE472; "> -->
<!-- <div class="row" style="margin-top: 5em;"> -->
<!-- <div class="col-sm-3" style="text-align: center;">
    <img src="{{ asset('icon/critical.png') }}" alt="..." height="50%">
    <h6>Critical Thinking</h6>
</div>
<div class="col-sm-3">
    <img src="{{ asset('icon/creative.png') }}" alt="..." height="50%">
    <h6>Creative Thinking</h6>
</div>
<div class="col-sm">
    <img src="{{ asset('icon/comunicate.png') }}" alt="..." height="50%">
    <h6>Cromunication</h6>
</div>
<div class="col-sm">
    
</div>
</div> -->
<!-- </div> -->

<!-- </div> -->


<div class="d-flex flex-wrap flex-row justify-content-around text-center align-items-center" style="color: white; background-color:#FFCE0A; height:20em;">
    <div class="div" style="height: 7em; width:7em;">
        <img src="{{ asset('icon/critical.png') }}" alt="..." class="img-fluid">
        <h6>Critical Thinking</h6>
    </div>
    <div class="div" style="height: 7em; width:7em;">
        <img src="{{ asset('icon/creative.png') }}" alt="..." class="img-fluid">
        <h6>Creative Thinking</h6>
    </div>
    <div class="div" style="height: 7em; width:7em;">
        <img src="{{ asset('icon/comunicate.png') }}" alt="..." class="img-fluid">
        <h6>Communication</h6>
    </div>
    <div class="div" style="height: 7em; width:7em;">
        <img src="{{ asset('icon/colab.png') }}" alt="..." class="img-fluid">
        <h6>Collaboration</h6>
    </div>
</div>


<div class="container pb-4 mt-4" style="display:table; height:10em;  width:100%">
    <!-- <div class="kotak" style="display:table-cell; vertical-align: middle; background-color:#FDD72A; display:block"> -->
    <div class="row border-primary">

        <div class="col-sm-6 border-primary  " style="text-align: center;">
            <img src="{{ asset('icon/DSC00136.JPG') }}" alt="..." class="img-thumbnail" height="100em" width="300em">
        </div>
        <div class="col-sm-6 border-primary text-left mt-4 ">
            <h1 style="color: #FDD72A;">TUJUAN</h1>
            Mempertemukan Guru dan Murid untuk belajar bersama di rumah dengan tujuan siswa
            memiliki kemampuan 4C (Critical Thinking, Creative Thinking, Communication dan
            Collaboration)
        </div>
    </div>
</div>
<!-- </div> -->


<div class="pt-4" style="color: white; background-color:#FFCE0A;">
    <!-- <div class="row ">
        <div class="col-1"></div>
        <div class="col">
            <h1 style="color: #264653;">Visi</h1>
        </div>
        <div class="col">
            <h1 style="color: #264653;">Misi</h1>
        </div>
        <div class="w-100"></div>
        <div class="col-1"></div>
        <div class="col">
            <ul>
                <li>

                    <p>Menjadi platform pendidikan yang terpercaya mencerdaskan dan mendidik karakter anak di
                        Bali Tahun 2022</p>
                </li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li>

                    <p>Memberikan pendidikan dengan metode yang menyenangkan dan mudah dimengerti.</p>
                </li>
                <li>

                    <p>Mendidik karakter anak dengan meningkatkan kemampuan critical thinking, creative
                        thinking, communication dan collaboration.</p>
                </li>
                <li>

                    <p>Memberikan pelayananan yang berkualitas dan tenaga kerja profesional.</p>
                </li>
                <li>

                    <p>Membangun sumber daya profesional dengan cara memberikan pelatihan, bimbingan
                        dan arahan.</p>
                </li>
                <li>

                    <p>Memiliki team kerja yang bisa bekerjasama, solid, ingin bertumbuh dan berfokus
                        pada pelayanan.</p>
                </li>
                </li>
                <li>

                    <p>Memiliki bisnis yang terus bertumbuh, menguntungkan dan manajemen profesional.</p>
                </li>
            </ul>
        </div>
    </div>
</div> -->

    <!-- tambah -->
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Visi</h1>
                <p>
                <ul>
                    <li>

                        <p>Menjadi platform pendidikan yang terpercaya mencerdaskan dan mendidik karakter anak di
                            Bali Tahun 2022</p>
                    </li>
                </ul>
                </p>
            </div>
            <div class="col-sm">
                <h1>Misi</h1>
                <p>
                <ul>
                    <li>

                        <p>Memberikan pendidikan dengan metode yang menyenangkan dan mudah dimengerti.</p>
                    </li>
                    <li>

                        <p>Mendidik karakter anak dengan meningkatkan kemampuan critical thinking, creative
                            thinking, communication dan collaboration.</p>
                    </li>
                    <li>

                        <p>Memberikan pelayananan yang berkualitas dan tenaga kerja profesional.</p>
                    </li>
                    <li>

                        <p>Membangun sumber daya profesional dengan cara memberikan pelatihan, bimbingan
                            dan arahan.</p>
                    </li>
                    <li>

                        <p>Memiliki team kerja yang bisa bekerjasama, solid, ingin bertumbuh dan berfokus
                            pada pelayanan.</p>
                    </li>
                    </li>
                    <li>

                        <p>Memiliki bisnis yang terus bertumbuh, menguntungkan dan manajemen profesional.</p>
                    </li>
                </ul>
                </p>
            </div>

        </div>
    </div>
</div>

@endsection