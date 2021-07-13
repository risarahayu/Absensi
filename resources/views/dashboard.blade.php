@extends('layouts.app')


@section('content')


<!-- <script type="text/javascript" src="{{asset('Chart.js')}}"></script> -->
<script src="https://cdnjs.com/libraries/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/helpers.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/helpers.esm.min.js"></script>



<div class="container mb-4">
    <div class="row">
        <div class="col-sm">
            <div class="card mb" style="max-width: 540px; ">
                <div class="row no-gutters">
                    <div class="col-md-7" style="">
                        <img src=" {{ asset ('icon\4.png')}}" class="card-img" alt="..." style="padding: 2em;">
                    </div>
                    <div class=" col-md">
                        <div class="card-body" style="margin-top:25%">
                            <h5 class="card-title">Jumlah Guru</h5>
                            <p class="card-text" style="color: #04A8EF;">{{$jumlah_guru}} Orang</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card mb" style="max-width: 540px; ">
                <div class="row no-gutters">
                    <div class="col-md-7" style="">
                        <img src=" {{ asset ('icon\1.png')}}" class="card-img" alt="..." style="padding: 2em;">
                    </div>
                    <div class=" col-md">
                        <div class="card-body" style="margin-top:25%">
                            <h5 class="card-title">Absen Hari ini</h5>
                            <p class="card-text" style="color: #04A8EF;">{{$pertemuan_hari_ini}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- tambah --}}
        <div class="col-sm">
            <div class="card mb" style="max-width: 540px; ">
                <div class="row no-gutters">
                    <div class="col-md-7" style="">
                        <img src=" {{ asset ('icon\1.png')}}" class="card-img" alt="..." style="padding: 2em;">
                    </div>
                    <div class=" col-md">
                        <div class="card-body" style="margin-top:25%">
                            <h5 class="card-title">jadwal Hari ini</h5>
                            <p class="card-text" style="color: #04A8EF;">{{$jadwal_hari_ini}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card mb" style="max-width: 540px; ">
                <div class="row no-gutters">
                    <div class="col-md-7" style="">
                        <img src=" {{ asset ('icon\7.png')}}" class="card-img" alt="..." style="padding: 2em;">
                    </div>
                    <div class=" col-sm">
                        <div class="card-body" style="margin-top:25%">
                            <h6 class="card-title" style="font-size: 1rem;">Gaji Bulan Ini</h6>
                            <p class="card-text" style="font-size: 1rem; color: #04A8EF;">Rp. {{number_format($jumlah_gaji, 0, ',', '.')}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container w-75">
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: '# Grafik Jumlah Kehadiran',
                    data: <?php echo json_encode($jumlah_absen_lesku); ?>,
                    backgroundColor: [
                        'rgba(253, 215, 42)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>


<div class="container w-75 mt-5">
    <h2>Jadwal Hari Ini</h2>
    @if ($list_hari_ini->count())


    <table class="table table-striped text-center">


        <thead style="background-color: #FDD72A;color:white;">
            <tr>



                <th scope="col" colspan="3">Waktu</th>
                <!-- <th scope="col">Nama Guru</th> -->
                <th scope="col">Nama Siswa</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Nomor Hp Guru</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">ID Guru</th>

                <!-- <th scope="col">Bulan</th>
                <th scope="col">Tahun</th> -->

            </tr>
        </thead>
        <tbody class="">
            @foreach($list_hari_ini as $jadwal)

            <tr>

                <td>{{$jadwal->waktu_mulai}}</td>
                <td>-</td>

                <td>{{$jadwal->waktu_selesai}}</td>

                <td>{{$jadwal->nama_siswa_les}}</td>
                <td>{{$jadwal->alamat_siswa}}</td>
                <td>{{$jadwal->status_jadwal}}</td>
                <td>{{$jadwal->mata_pelajaran_les}}</td>
                <td>{{$jadwal->nomor_Hp}}</td>

                <td>{{$jadwal->nama}}</td>
                <td>{{$jadwal->user_id}}</td>



            </tr>
            @endforeach

        </tbody>
    </table>
    @else
    <div class="alert alert-warning" role="alert">
        Anda belum memiliki jadwal
    </div>
    @endif



    <!-- absen hari ini -->
    <h2 class="mt-5">Absen Hari Ini</h2>
    @if ($absen_hari_ini->count())
    <table class="table table-striped text-center">


        <thead style="background-color: #FDD72A; color:white;">

            <tr>




                <th scope="col">Nama Siswa</th>

                <th scope="col">Waktu Absen</th>



            </tr>
        </thead>
        <tbody class="">
            @foreach($absen_hari_ini as $absen)

            <tr>

                <td>{{$absen->nama_siswa}}</td>

                <td>{{$absen->created_at}}</td>


            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="alert alert-warning" role="alert">
        Belum ada absen hari ini
    </div>
    @endif

</div>

@endsection