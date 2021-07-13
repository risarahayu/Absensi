<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset ('icon/logo.png') }}">
    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>Lesku.id</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="width: 20%;">

                    <!-- {{ config('app.nama', 'Laravel') }} -->
                    <H3>
                        <img height="100%" width="100%" src="{{asset ('icon/logo lesku.png') }}">
                    </H3>
                </a>




                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        @if(auth()->user()->status_user=="admin")

                        <li>
                            <!-- tambahan -->

                            <!--  -->
                            <!--  -->
                            <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> -->

                            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> -->
                            <!-- <span class="navbar-toggler-icon"></span> -->
                            <!-- </button> -->
                            <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
                            <!-- <ul class="navbar-nav"> -->
                        <li class="nav-item {{request()->is('daftar_guru')?'active':''}}">
                            <a class="nav-link" href="/daftar_guru">Guru Lesku</a>
                        </li>
                        <li class="nav-item {{request()->is('jadwal')?'active':''}}">
                            <a class="nav-link" href="/jadwal">Jadwal</a>
                        </li>
                        {{-- <li class="nav-item {{request()->is('tambahJadwal')?'active':''}}">
                        <a class="nav-link" href="/tambahJadwal">Form Jadwal</a>
                        </li> --}}
                        <li class="nav-item  {{request()->is('dashboard')?'active':''}}">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item  {{request()->is('daftar_riwayat_guru')?'active':''}}">
                            <a class="nav-link" href="/daftar_riwayat_guru">Absen Bulan Ini</a>
                        </li>
                        <li class="nav-item  {{request()->is('rekap_gaji_guru')?'active':''}}">
                            <a class="nav-link" href="/rekap_gaji_guru">Rekap Gaji Guru</a>
                        </li>

                        <!-- <li class="nav-item  {{request()->is('dashboard')?'active':''}}">
                            <a class="nav-link" href="/dashboard">dashboard</a>
                        </li> -->
                        <!-- </ul> -->
                        <!-- </div> -->
                        <!-- </nav> -->
                        <!--  -->
                        @endif
                        @if(auth()->user()->status_user=="guru")
                        <!--  -->
                        <!--  -->
                        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> -->

                        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> -->
                        <!-- <span class="navbar-toggler-icon"></span> -->
                        <!-- </button> -->
                        <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
                        <!-- <ul class="navbar-nav"> -->



                        <li class="nav-item {{request()->is('absen')?'active':''}}">
                            <a class="nav-link" href="/absen">Form Absen</a>
                        </li>
                        <li class="nav-item  {{request()->is('riwayat')?'active':''}}">
                            <a class="nav-link" href="/riwayat">Riwayat Absen</a>
                        </li>
                        <li class="nav-item  {{request()->is('jadwalGuru')?'active':''}}">
                            <a class="nav-link" href="/jadwalGuru">Jadwal Lesku </a>
                        </li>
                        <li class="nav-item  {{request()->is('jadwal_guru_hari_ini')?'active':''}}">
                            <a class="nav-link" href=" /jadwal_guru_hari_ini">Jadwal Hari Ini</a>
                        </li>

                        <!-- </ul> -->
                        <!-- </div> -->
                        <!-- </nav> -->
                        <!--  -->
                        @endif
                        </li>
                    </ul>
                    <div class="continer" style="width:min-content;">

                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{asset(Auth::user()->foto_guru)}}" style="max-height: 50px; object-fit:contain;" width="100%" class="rounded-circle">
                                {{ Auth::user()->nama }} </a>

                            <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                @if(auth()->user()->status_user=="guru")
                                <a class="dropdown-item" href="/profile">

                                    Profile
                                </a>
                                @endif

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>



                            </div>

                        </div>

                    </div>

                    @endguest



                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>