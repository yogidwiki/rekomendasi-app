@extends('layouts.landingpage')
@section('content')
<div style="background-color:#C2D2C5 ;">
    <div class="container py-5">
        <div class="row d-flex align-items-center justify-content-center gap-3 my-5">
            <div class="col-md-4 d-flex align-items-center justify-content-center " style="height: 100vh;">
                <img src="{{asset('image/fam.png')}}" alt="Gambar Anda" style="max-width: 100%; height: auto;">
                <!-- Konten sebelah kiri dengan background biru -->
            </div>
            <div class="col-md-7">
                <div class="card border-0 p-4" style="border-radius: 32px;">
                    <h4 class="fw-bold text-center my-3">Register</h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Formulir register di sebelah kanan -->
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <label for="name" class="form-label">Nama</label>
                                        <input style="border: none;border-bottom:2px solid #aeaeae;  background-color: transparent;"  id="name" type="text" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" onFocus="this.style.borderBottom='2px solid #52b678';"
                                        onBlur="this.style.boxShadow='none';">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input style="border: none;border-bottom:2px solid #aeaeae;  background-color: transparent;" id="email" type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" onFocus="this.style.borderBottom='2px solid #52b678';"
                                        onBlur="this.style.boxShadow='none';">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input style="border: none;border-bottom:2px solid #aeaeae;  background-color: transparent;" id="password" type="password" placeholder="Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" onFocus="this.style.borderBottom='2px solid #52b678';"
                                        onBlur="this.style.boxShadow='none';">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <label for="password-confirm" class="form-label">Confirm Password</label>
                                        <input style="border: none;border-bottom:2px solid #aeaeae;  background-color: transparent;" id="password-confirm" type="password" placeholder="Confirm Your Password" class="form-control" name="password_confirmation" required autocomplete="new-password" onFocus="this.style.borderBottom='2px solid #52b678';"
                                        onBlur="this.style.boxShadow='none';">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <label for="birthdate" class="form-label">{{ __('Tanggal Lahir') }}</label>
                                        <input style="border: none;border-bottom:2px solid #aeaeae;  background-color: transparent;"  id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthday" value="{{ old('birthdate') }}" required onFocus="this.style.borderBottom='2px solid #52b678';" onBlur="this.style.boxShadow='none';">
                                        @error('birthdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-3 form-group">
                                        <label for="gender" class="form-label">{{ __('Jenis Kelamin') }}</label>
                                        <select style="border: none;border-bottom:2px solid #aeaeae;  background-color: transparent;" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required onFocus="this.style.borderBottom='2px solid #52b678';" onBlur="this.style.boxShadow='none';">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" @if(old('gender') == 'Laki-laki') selected @endif>Laki-laki</option>
                                            <option value="Perempuan" @if(old('gender') == 'Perempuan') selected @endif>Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 mt-4">
                                <button type="submit" class="btn btn-login btn-secondary px-3 d-block w-100">
                                    {{ __('Register') }}
                                </button>
                                <p class="text-center small">
                                    <a href="{{ route('register') }}" class="nav-link text-success fw-semibold mt-4 mb-5">Have an account? Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
