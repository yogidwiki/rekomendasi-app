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
        text-align: center;
        margin-top: 3%;
    }

    .slider {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
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

    /* Gaya tambahan untuk memberikan padding pada tombol Selesai */
    .selesai-button {
        padding-top: 20px;
        text-align: center;
    }

    /* Gaya untuk merespons pada perangkat dengan lebar layar yang kecil */
    @media (max-width: 767px) {
        .centered-content {
            font-size: 24px;
            font-weight: bold;
        }
        .pilihan {
            font-size: 14px
        }
    }
    @media (max-width: 375px) {
        .centered-content {
            font-size: 20px;
        }
        .pilihan {
            font-size: 12px
        }
    }
</style>
@endsection

@section('content')
<div class="container min-vh-100" style="padding-top: 100px">
    <div class="row">
        <form action="{{ route('answer.store') }}" method="POST">
            @csrf <!-- Add the CSRF token for security -->
            @foreach ($question as $item)
            <div class="col-md-12">
                <!-- Gambar dengan teks di bawahnya -->
                <div class="centered-content">
                    <h2 class="fw-bold">{{ $item->konten }}</h2>
                </div>
            </div>
            <div class="col-md-8 col-8 mx-auto">
                <div class="slider-container">
                    <input type="range" class="slider" name="score[]" id="score-{{ $item->id }}" min="0" max="4">
                </div>
            </div>
            <div class="tickmark col-md-12 text-center">
                <div class="row justify-content-center pilihan">
                    <p class="col-2 text-center">Sangat Tidak</p>
                    <p class="col-2 text-center">Kurang</p>
                    <p class="col-2 text-center">Biasa Saja</p>
                    <p class="col-2 text-center">Cukup</p>
                    <p class="col-2 text-center">Sangat Bisa</p>
                </div>
            </div>
            @endforeach
            <div class="selesai-button col-md-12">
                <button type="submit" class="btn btn-login btn-success px-3">Selesai</button>
            </div>
        </form>
    </div>
</div>
@endsection
