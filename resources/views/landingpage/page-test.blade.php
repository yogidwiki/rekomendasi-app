@extends('layouts.landingpage')

@section('css')
<style>
    /* Gaya khusus untuk menengahkan teks secara vertikal dan horizontal */
    .centered-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #585858;
        font-size: 43.43px;
        font-family: Poppins;
        font-weight: 400;
        text-align: center;
        padding-top: 40px;
    }

    /* Gaya khusus untuk gambar */
    .centered-content img {
        max-width: 100%;
    }

    .slider-container {
        width: 100%;
        margin-left: 29%;
        margin-top: 3%;
    }

    .slider {
        -webkit-appearance: none;
        width: 150%;
        height: 20px;
        background: #b3aaaa;
        border-radius: 16px;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 100%;
        background: #04AA6D;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #0eb97a;
        cursor: pointer;
    }

    .tickmark {
        color: #04AA6D;
        font-size: 17px;
        font-family: Poppins;
        font-weight: bold;
        margin-top: 3%;
    }
</style>
@endsection

@section('content')
<div class="container">
<div class="row">
    <form action="{{route('answer.store')}}" method="POST">
        @csrf <!-- Add the CSRF token for security -->
        @foreach ($question as $item)
        <div class="col-sm-12">
            <!-- Gambar dengan teks di bawahnya -->
            <div class="centered-content">
                <p>{{ $item->konten }}</p>
            </div>
        </div>
        <div class="col-md-6">
        <div class="slider-container">
                <input type="range" class="slider" name="score[]" id="score-{{ $item->id }}" min="0" max="4">
            </div>
        </div>
        <div class="tickmark row justify-content-lg-center">
            <div class="col-md-2 text-center">Sangat Tidak</div>
            <div class="col-md-2 text-center">Kurang</div>
            <div class="col-md-2 text-center">Biasa Saja</div>
            <div class="col-md-2 text-center">Cukup</div>
            <div class="col-md-2 text-center">Sangat Bisa</div>
        </div>
        @endforeach
        <div class="text-center mt-5">
        <button type="submit" class="btn btn-login btn-success px-3">Selesai</button>
</div>
        
    </form>
</div>

</div>


</div>


@endsection
