@extends('layouts.app')
@section('content')

<div class="container mt-4 ">

    <!-- form absen -->

    <form action="{{url ('/jadwal/store')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md">
                <div class="container ml-0 pl-0">
                    <img src="{{ ('icon/face-black-18dp.svg') }}">
                    <label for="tanggal">Tanggal</label>
                </div>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="masukan dengan format 04/30/2021 ">
                @error('tanggal')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group col-md">
                <div class="container ml-0 pl-0">
                    <img src="{{ ('icon/location_on-black-18dp.svg') }}">
                    <label for="waktu_mulai">Waktu Mulai</label>
                </div>
                <input type="text" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai" name="waktu_mulai">
                @error('waktu_mulai')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
            <div class="form-group col-md">
                <div class="container ml-0 pl-0">
                    <img src="{{ ('icon/location_on-black-18dp.svg') }}">
                    <label for="waktu_mulai">Waktu Selesai</label>
                </div>
                <input type="text" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai" name="waktu_selesai">
                @error('waktu_selesai')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="user_id">Id Guru</label>
                <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                @error('user_id')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript">
                $("#user_id").focusout(function(e) {
                    // alert($(this).val());
                    var user_id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "{{url ('/jadwal/ajax')}}",
                        data: {
                            'user_id': user_id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $('#nama').val(data.nama);
                            $('#nomor_Hp').val(data.nomor_Hp);

                        },
                        error: function(response) {
                            alert(response.responseJSON.message);
                        }
                    });
                });
            </script>
            <div class="form-group col-md-5">
                <label for="metode_les">Nama Guru</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                @error('nama')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
            <div class="form-group col-md-5">
                <label for="nomor_Hp">No. HP Guru</label>
                <input type="text" class="form-control @error('nomor_Hp') is-invalid @enderror" id="nomor_Hp" name="nomor_Hp">
                @error('nomor_Hp')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" class="form-control @error('nama_siswa_les') is-invalid @enderror" id="nama_siswa_les" name="nama_siswa_les">
                @error('nama_siswa_les')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
            <div class="form-group col-md">
                <label for="jenjang_siswa">Jenjang Siswa</label>
                <select id="jenjang_siswa" class="form-control @error('jenjang_siswa') is-invalid @enderror" name="jenjang_siswa" require>

                    <option selected disabled>PIlih jenjang siswa</option>

                    <option>SD>Private</option>
                    <option>SD>Kelompok</option>
                    <option>SMP>Private</option>
                    <option>SMP>Kelompok</option>
                    <option>SMA>Private</option>
                    <option>SMA>Kelompok</option>

                </select>


                @error('jenjang_siswa')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>

        </div>
        <div class="form-row">



            <div class="form-group col-md">
                <label for="metode_les">Alamat Siswa</label>
                <input type="text" class="form-control @error('alamat_siswa') is-invalid @enderror" id="alamat_siswa" name="alamat_siswa">
                @error('alamat_siswa')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
            <div class="form-group col-md">
                <label for="mata_pelajaran_les">Mata Pelajaran</label>
                <input type="text" class="form-control @error('mata_pelajaran_les') is-invalid @enderror" id="mata_pelajaran_les" name="mata_pelajaran_les" placeholder="IPA/IPS/Matematika">
                @error('mata_pelajaran_les')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>


            <div class="form-group col-md">
                <label for="status_jadwal">status_jadwal</label>
                <select id="status_jadwal" class="form-control @error('status_jadwal') is-invalid @enderror" name="status_jadwal" require>
                    <option selected disabled>Pilih status jadwal</option>
                    <option>Aktif</option>
                    <option>Batal</option>
                    <option>Ganti Jadwal</option>
                </select>
                @error('status_jadwal')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

        </div>

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
                <label for="nomor_siswa">Nomor Siswa</label>
                <input type="text" class="form-control @error('nomor_siswa') is-invalid @enderror" id="nomor_siswa" name="nomor_siswa">

                @error('nomor_siswa')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Input Jadwal</button>
    </form>
    <!-- form absen -->
</div>

@endsection