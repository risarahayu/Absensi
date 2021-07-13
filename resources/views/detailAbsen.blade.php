@extends('layouts.app')
@section('content')


@foreach ($detailAbsen as $riwayat)

<div class="" style="margin-left:25%;">
  <div class="card mb-3" style="max-width: 700px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{asset($riwayat->foto_absen)}}" width="100%" class="" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title" style="color: #F4C304">Detail Absen</h5>
          <p class="card-text">
          <table>
            <thead>
              <tr>
                <th scope="col">Tanggal</th>
                <td class="pl-5">{{$riwayat->created_at}}</td>
              </tr>
              <tr>
                <th scope="col">Nama Guru</th>
                <td class="pl-5">{{$riwayat->author['nama']}}</td>
              </tr>
              <tr>
                <th scope="col">Nama Siswa</th>
                <td class="pl-5">{{$riwayat->nama_siswa}}</td>
              </tr>
              <tr>
                <th scope="col">Mata Pelajaran</th>
                <td class="pl-5">{{$riwayat->mata_pelajaran}}</td>
              </tr>
              <tr>
                <th scope="col">Materi Ajar</th>
                <td class="pl-5">{{$riwayat->materi_ajar}}</td>
              </tr>
              <tr>
                <th scope="col">Alamat</th>
                <td class="pl-5">{{$riwayat->alamat_siswa}}</td>
              </tr>
              <tr>
                <th scope="col">Jenjang Siswa</th>
                <td class="pl-5">{{$riwayat->kategori->jenjang_siswa}}</td>
              </tr>
              <tr>
                <th scope="col">Metode Les</th>
                <td class="pl-5">{{$riwayat->metode_les}}</td>
              </tr>
              <tr>
                <th scope="col">Status Les</th>
                <td class="pl-5">{{$riwayat->kategori->status_les}}</td>
              </tr>

            </thead>
          </table>
          </p>
          <p class="card-text"><button type="button" class="btn btn-warning"> Rp. {{number_format($riwayat->kategori->fee, 0, ',', '.')}}</button>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

@endforeach
@endsection