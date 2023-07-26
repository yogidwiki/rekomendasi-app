@extends('layouts.landingpage')


@section('content')

<section style="background-color:#C2D2C5 ;">
    <div class="container">
        <div class="row justify-content-between align-items-center py-5 mb-4 my-5 ">
            <div class="col-md-5">
                <div class="card p-4" style="border-radius: 32px;">
                    <h4 class="text-center fw-bold mb-5 mt-3">Sign In</h4>
                    <div class="row d-flex justify-content-center align-items-center gap-5">
                        <div class="col-md-12 pb-5 ">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            
                                <div class="row mb-3">
                                    <label for="email" class="col-md-1 col-form-label text-md-end"><i class="bi bi-person-circle"></i></label>
                            
                                    <div class="col-md-11">
                                        <input 
                                            style="border: none;border-bottom:2px solid #aeaeae;  background-color: transparent;" placeholder="Email"  
                                            id="email" type="email" 
                                            class="form-control py-2 px-4 @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email') }}" 
                                            required autocomplete="email"
                                            onFocus="this.style.borderBottom='2px solid #52b678';"
                                            onBlur="this.style.boxShadow='none';">
                            
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label for="password" class="col-md-1 col-form-label text-md-end"><i class="bi bi-lock-fill"></i></label>
                            
                                    <div class="col-md-11">
                                        <input 
                                            style="border: none;border-bottom:2px solid #aeaeae;" 
                                            placeholder="Password" 
                                            id="password" 
                                            type="password" 
                                            class="form-control py-2 px-4 @error('password') is-invalid @enderror" 
                                            name="password" 
                                            required autocomplete="current-password"
                                            onFocus="this.style.borderBottom='2px solid #52b678';"
                                            onBlur="this.style.boxShadow='none';">
                            
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p class="text-end small">
                                            <a href="{{ route('password.request') }}" class="nav-link mt-3">Forgot password?</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-login btn-success d-block w-100 px-5">
                                            Login
                                        </button>
                                    </div>
                                    <p class="text-center small">
                                        <a href="{{ route('register') }}" class="nav-link text-success fw-semibold mt-4 mb-5">Dont have an account? Create account</a>
                                    </p>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
    
            <div class="col-md-6">
                
                <img src="{{ asset('image/logo-login.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
            </div>
        </div>
    </div>
</section>



@endsection
