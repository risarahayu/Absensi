<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Cetak Laporan Absensi</title>


</head>

<body>
    <div class="container">
        <h1><img height="20%" width="20%" src="{{asset ('icon/logo lesku.png') }}"> Laporan Gaji Guru </h1>
        <table class="table table-striped mt-5">
            <thead class="" style="color: black;">
                <tr>
                    <th style="vertical-align: middle;" scope="col">Tanggal</th>
                    <th scope="col">Nama Guru</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Materi Ajar</th>
                    <th style="vertical-align: middle;" scope="col">Alamat</th>
                    <th scope="col">Jenjang Siswa</th>
                    <th scope="col">Metode Les</th>
                    <th scope="col">Status Les</th>
                    <th style="vertical-align: middle;" scope="col">Fee</th>

                </tr>
            </thead>
            <tbody>


                @foreach($cetakAbsen as $riwayat)
                <tr>
                    <td>{{$riwayat->created_at}}</td>
                    <td>{{$riwayat->author['nama']}}</td>
                    <td>{{$riwayat->nama_siswa}}</td>
                    <td>{{$riwayat->mata_pelajaran}}</td>
                    <td>{{$riwayat->materi_ajar}}</td>
                    <td>{{$riwayat->alamat_siswa}}</td>
                    <td>{{$riwayat->kategori->jenjang_siswa}}</td>
                    <td>{{$riwayat->metode_les}}</td>
                    <td>{{$riwayat->kategori->status_les}}</td>
                    <td> Rp. {{number_format($riwayat->kategori->fee, 0, ',', '.')}}</td>

                    <!-- <td>{{$riwayat->foto_}}</td> -->

                </tr>

                @endforeach
                <tr style="">
                    <td colspan="8">Total Gaji</td>
                    <td colspan="2" style="text-align: right;">
                        Rp. {{number_format($jumlah, 0, ',', '.')}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>