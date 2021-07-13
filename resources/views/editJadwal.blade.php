@extends('layouts.app')
@section('content')

<div class="container mt-4 ">

    <!-- form absen -->

    <form action="{{url ("/jadwal/{$jadwal->id}")}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="container ml-0 pl-0">
                    <img src="{{asset ('icon/face-black-18dp.svg') }}">
                    <label for="tanggal">Tanggal</label>
                </div>

                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ date('Y-m-d', strtotime($jadwal->tanggal)) }}">

            </div>
            <div class="form-group col-md-4">
                <div class="container ml-0 pl-0">
                    <img src="{{asset('icon/location_on-black-18dp.svg') }}">
                    <label for="waktu_mulai">Waktu Mulai</label>
                </div>
                <input type="text" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai" name="waktu_mulai" value="{{$jadwal->waktu_mulai}}">

            </div>
            <div class="form-group col-md-4">
                <div class="container ml-0 pl-0">
                    <img src="{{asset('icon/location_on-black-18dp.svg') }}">
                    <label for="waktu_selesai">Waktu Selesai</label>
                </div>
                <input type="text" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai" name="waktu_selesai" value="{{$jadwal->waktu_selesai}}">

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2">
                <label for="user_id">Id Guru</label>
                <input type="text" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" value="{{$jadwal->user_id}}">
            </div>
            <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

            <div class="form-group col-md">
                <label for="metode_les">Nama Guru</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$jadwal->nama}}">
            </div>
            <div class=" form-group col-md">
                <label for="nomor_Hp">No. HP Guru</label>
                <input type="text" class="form-control @error('nomor_Hp') is-invalid @enderror" id="nomor_Hp" name="nomor_Hp" value="{{$jadwal->nomor_Hp}}">
            </div>


        </div>
        <div class=" form-row">
            <!-- <div class="form-group col-md-6">
                <label for="metode_les">Nama Guru</label>
                <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" name="nama_guru">
                @error('nama_guru')
                <div class="invalid-feedback text-danger text-sm">
                    {{$message}}
                </div>

                @enderror
            </div> -->
            <div class="form-group col-md">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" class="form-control @error('nama_siswa_les') is-invalid @enderror" id="nama_siswa_les" name="nama_siswa_les" value="{{$jadwal->nama_siswa_les}}">

            </div>
            <div class="form-group col-md">
                <label for="jenjang_siswa">Jenjang Siswa</label>
                <select id="jenjang_siswa" class="form-control @error('jenjang_siswa') is-invalid @enderror" name="jenjang_siswa" require>
                    <option selected disabled>Pilih jenjang siswa</option>
                    <option value="SD>Private" {{$jadwal->jenjang_siswa=='SD>Private'? 'selected': ''}}>SD>Private</option>
                    <option value="SD>Kelompok" {{$jadwal->jenjang_siswa=='SD>Kelompok'? 'selected': ''}}>SD>Kelompok</option>
                    <option value="SMP>Private" {{$jadwal->jenjang_siswa=='SMP>Private'? 'selected': ''}}>SMP>Private</option>
                    <option value="SMP>Kelompok" {{$jadwal->jenjang_siswa=='SMP>Kelompok'? 'selected': ''}}>SMP>Kelompok</option>
                    <option value="SMA>Private" {{$jadwal->jenjang_siswa=='SMA>Private'? 'selected': ''}}>SMA>Private</option>
                    <option value="SMA>Kelompok" {{$jadwal->jenjang_siswa=='SMA>Kelompok'? 'selected': ''}}>SMA>Kelompok</option>


                </select>

            </div>

            <div class="form-group col-md">
                <label for="metode_les">Alamat Siswa</label>
                <input type="text" class="form-control @error('alamat_siswa') is-invalid @enderror" id="alamat_siswa" name="alamat_siswa" value="{{$jadwal->alamat_siswa}}">

            </div>


        </div>
        <div class="row">
            <div class="form-group col-md">
                <label for="mata_pelajaran_les">Mata Pelajaran</label>
                <input type="text" class="form-control" id="mata_pelajaran_les" name="mata_pelajaran_les" placeholder="IPA/IPS/Matematika" value="{{$jadwal->mata_pelajaran_les}}">
            </div>
            <div class="form-group col-md">
                <label for="status_jadwal">status_jadwal</label>
                <select id="status_jadwal" class="form-control" name="status_jadwal" value="{{$jadwal->status_jadwal}}">
                    <option selected disabled>Pilih status jadwal</option>
                    <option value="Aktif" {{$jadwal->status_jadwal=='Aktif'? 'selected': ''}}>Aktif</option>
                    <option value="Batal" {{$jadwal->status_jadwal=='Batal'? 'selected': ''}}>Batal</option>
                    <option value="Ganti Jadwal" {{$jadwal->status_jadwal=='Ganti Jadwal'? 'selected': ''}}>Ganti Jadwal</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="metode_les">Metode Les</label>
                <select id="metode_les" class="form-control @error('metode_les') is-invalid @enderror" name="metode_les">
                    <option selected disabled>Choose...</option>
                    <option value="Online" {{$jadwal->metode_les=='Online'? 'selected': ''}}>Online</option>
                    <option value="Offline" {{$jadwal->metode_les=='Offline'? 'selected': ''}}>Offline</option>
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