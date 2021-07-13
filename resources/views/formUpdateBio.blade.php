@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background-color: #FDD72A;">Edir P</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('/prosesUpdate') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" value="{{$user['nama']}}" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- tambah kolom -->
                        <div class="form-group row">
                            <label for="status_user" class="col-md-4 col-form-label text-md-right">{{ __('status user') }}</label>

                            <div class="col-md-6">
                                <input id="status_user" type="text" value="{{$user['status_user']}}" class="form-control @error('status_user') is-invalid @enderror" name="status_user" value="{{ old('status_user') }}" required autocomplete="status_user" autofocus>

                                @error('status_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--  -->
                        <!-- tambha -->
                        <div class="form-group row">
                            <label for="nomor_Hp" class="col-md-4 col-form-label text-md-right">{{ __('nomor Hp') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_Hp" type="text" value="{{$user['nomor_Hp']}}" class="form-control @error('nomor_Hp') is-invalid @enderror" name="nomor_Hp" value="{{ old('nomor_Hp') }}" required autocomplete="nomor_Hp" autofocus>

                                @error('nomor_Hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--  -->
                        <!-- tambha -->
                        <div class="form-group row">
                            <label for="mapel" class="col-md-4 col-form-label text-md-right">{{ __('mapel') }}</label>

                            <div class="col-md-6">
                                <input id="mapel" type="text" class="form-control @error('mapel') is-invalid @enderror" name="mapel" value="{{ old('mapel') }}" value="{{$user['mapel']}}" required autocomplete="mapel" autofocus>

                                @error('mapel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--  -->
                        <!-- tambha -->
                        <div class="form-group row">
                            <label for="nomor_rekening" class="col-md-4 col-form-label text-md-right">{{ __('nomor_rekening') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_rekening" type="text" value="{{$user['nomor_rekening']}} class=" form-control @error('nomor_rekening') is-invalid @enderror" name="nomor_rekening" value="{{ old('nomor_rekening') }}" required autocomplete="nomor_rekening" autofocus>

                                @error('nomor_rekening')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--  -->
                        <!-- tambah -->
                        <div class="form-group row">
                            <label for="foto_guru" class="col-md-4 col-form-label text-md-right">{{ __('foto_guru') }}</label>

                            <div class="col-md-6">
                                <input id="foto_guru" type="text" value="{{$user['foto_guru']}} class=" form-control @error('foto_guru') is-invalid @enderror" name="foto_guru" value="{{ old('foto_guru') }}" required autocomplete="foto_guru" autofocus>

                                @error('foto_guru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--  -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$user['email']}} class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn rounded-pill text-white" style="background-color: #FDD72A;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection