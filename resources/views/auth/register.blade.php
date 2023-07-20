@extends('layouts.landingpage')
@section('css')
<style>
    .form-group input {
        border: none;
        border-bottom: 2px solid #aeaeae;
        padding: 10px
    }
</style>
    
@endsection

@section('content')
<div>
    <div class="row">
        <div class="col-md-4 bg-info" style="height: 100vh;">
            <img src="path/to/your/image.jpg" alt="Gambar Anda" style="max-width: 100%; height: auto;">
            <!-- Konten sebelah kiri dengan background biru -->
        </div>
        <div class="col-md-8 px-5">
            <div class="card border-0">
                <div class="fw-bold text-center my-5">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Formulir register di sebelah kanan -->
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">{{ __('NAMA') }}</label>
                            <input id="name" type="text" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <label for="email" class="form-label">{{ __('EMAIL ADDRESS') }}</label>
                            <input id="email" type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <label for="password" class="form-label">{{ __('PASSWORD') }}</label>
                            <input id="password" type="password" placeholder="Your Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <label for="password-confirm" class="form-label">{{ __('CONFIRM PASSWORD') }}</label>
                            <input id="password-confirm" type="password" placeholder="Confirm Your Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
