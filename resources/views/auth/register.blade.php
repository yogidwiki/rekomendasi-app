@extends('layouts.landingpage')

@section('content')
<div class="my-5" style="background-color:#C2D2C5;">
    <div class="container py-5">
        <div class="row d-flex align-items-center justify-content-center gap-3 my-5">
            <div class="col-md-12">
                <div class="card border-0 p-4" style="border-radius: 32px;">
                    <h4 class="fw-bold text-center my-3">Register</h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="name" type="text" placeholder="Enter Your username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="email" type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="password" type="password" placeholder="Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="password-confirm" type="password" placeholder="Confirm Your Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                          
                            <hr>
                            <h5 class="text-start fw-bold my-4">Data Orang Tua</h5>
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="nama_ayah" type="text" placeholder="Nama Lengkap Ayah" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                                        @error('nama_ayah')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="nama_ibu" type="text" placeholder="Nama Lengkap Ibu" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="nomor_identitas" type="text" placeholder="Nomor Identitas (KTP/SIM) Ayah/Ibu" class="form-control @error('nomor_identitas') is-invalid @enderror" name="nomor_identitas" value="{{ old('nomor_identitas') }}" required>
                                        @error('nomor_identitas')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="alamat" type="text" placeholder="Alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="nomor_telepon" type="text" placeholder="Nomor Telepon Ayah/Ibu" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
                                        @error('nomor_telepon')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="pekerjaan_ayah" type="text" placeholder="pekerjaan Ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
                                        @error('pekerjaan_ayah')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <input id="pekerjaan_ibu" type="text" placeholder="pekerjaan Ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
                                        @error('pekerjaan_ibu')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="pendidikan_terakhir_ayah" type="text" placeholder="Pendidikan Terakhir Ayah" class="form-control @error('pendidikan_terakhir_ayah') is-invalid @enderror" name="pendidikan_terakhir_ayah" value="{{ old('pendidikan_terakhir_ayah') }}" required>
                                        @error('pendidikan_terakhir_ayah')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <input id="pendidikan_terakhir_ibu" type="text" placeholder="pendidikan terakhir ibu" class="form-control @error('pendidikan_terakhir_ibu') is-invalid @enderror" name="pendidikan_terakhir_ibu" value="{{ old('pendidikan_terakhir_ibu') }}" required>
                                        @error('pendidikan_terakhir_ibu')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 mt-4">
                                <button type="submit" class="btn btn-login btn-secondary px-3 d-block w-100">
                                    {{ __('Register') }}
                                </button>
                                <p class="text-center small">
                                    <a href="{{ route('login') }}" class="nav-link text-success fw-semibold mt-4 mb-5">Have an account? Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('errors'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($errors->all() as $error)
                alert('{{ $error }}');
            @endforeach
        });
    </script>
@endif
@endsection
