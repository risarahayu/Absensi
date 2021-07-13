@extends('layouts.app')
@section('content')

<div class="container mt-4 ">

    <!-- form absen -->

    <form action="/absen/store" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="container ml-0 pl-0">
                    <img src="{{ ('icon/face-black-18dp.svg') }}">
                    <label for="nama_siswa">Nama Siswa</label>
                </div>

                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa">
                @error('nama_siswa')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
            <div class="form-group col-md-6">
                <div class="container ml-0 pl-0">
                    <img src="{{ ('icon/location_on-black-18dp.svg') }}">
                    <label for="alamat_siswa">Alamat Siswa</label>
                </div>
                <input type="text" class="form-control @error('alamat_siswa') is-invalid @enderror" id="alamat_siswa" name="alamat_siswa">
                @error('alamat_siswa')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
        </div>
        <fieldset>
            <legend class=".bg-warning">Informasi Les</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="metode_les">Metode Les</label>
                    <select id="metode_les" class="form-control @error('metode_les') is-invalid @enderror" name="metode_les">
                        <option selected disabled>Choose...</option>
                        <option>Online</option>
                        <option>Offline</option>
                    </select>
                    @error('metode_les')
                    <div class="invalid-feedback text-danger text-sm">
                        {{$message}}
                    </div>

                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="kategori_id">Kategori Les</label>
                    <select id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id">

                        <option selected disabled>Pilih Kategori</option>



                        <option value="1">SD > Privat</option>
                        <option value="2">SD > Kelompok</option>
                        <option value="3">SMP> Privat</option>
                        <option value="4">SMP> Kelompok</option>
                        <option value="5">SMA> Privat</option>
                        <option value="6">SMA> Kelompok</option>


                    </select>
                    @error('kategori_id')
                    <div class="invalid-feedback text-danger text-sm">
                        {{$message}}
                    </div>

                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <input type="text" class="form-control @error('mata_pelajaran') is-invalid @enderror" id="mata_pelajaran" name="mata_pelajaran" placeholder="IPA/IPS/Matematika">
                    @error('mata_pelajaran')
                    <div class="invalid-feedback text-danger text-sm">
                        {{$message}}
                    </div>

                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="materi_ajar">Materi Ajar</label>
                    <input type="text" class="form-control @error('materi_ajar') is-invalid @enderror" id="materi_ajar" name="materi_ajar">
                    @error('materi_ajar')
                    <div class="invalid-feedback text-danger text-sm">
                        {{$message}}
                    </div>

                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="foto_absen">Masukan Foto Bukti Absen</label>
                <input type="file" class="form-control-file @error('foto_absen') is-invalid @enderror" id="foto_absen" name="foto_absen">
                @error('foto_absen')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>

        </fieldset>
        <button type="submit" class="btn btn-primary mt-4">Absen</button>
    </form>
    <!-- form absen -->
</div>

@endsection