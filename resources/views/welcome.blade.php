@extends('layouts.landingpage')

@section('content')
    <style>
        .img-container {
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('{{ asset('image/cipung.png') }}');
            background-size: cover;
            background-posisition: center;

            border-radius: 32px;
        }

        .img-container2 {

            border-radius: 32px;
            width: 50%;
            height: 300px;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('{{ asset('image/cipung.png') }}');
            background-size: cover;
            background-posisition: center;
        }

        .img-container3 {
            border-radius: 32px;
            width: cipung00%;
            height: cipung00%;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('{{ asset('image/cipung.png') }}');
            background-size: cover;
            background-posisition: center;
        }

        .isi-content {
            margin-top: 350px;
        }

        .isi-content2 {
            margin-top: 230px;
            color: white;
        }
    </style>
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-8">
                <h5 class="fw-semibold " >Welcome to ParentApp! </h5>
                <h1 style="font-size:50px;" class="fw-bold text-success">Parenting Path: Nurturing Futures, One Step at a Time</h1>
                <p class="lh-base">Creating Stronger Bonds, Raising Exceptional Children . Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Qui fuga commodi quibusdam quo. Culpa nobis placeat quia, velit maxime iure!</p>
                <a href="{{route('about')}}" class="btn mt-3 btn-login px-5">About us</a>
            </div>
            <div class="col-md-4 ">
                <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
            </div>
        </div>
    </div>

    <section style="background-color:#C2D2C5 ">
        <div class="container py-5  my-5">
            <h4 class="text-success text-center fw-bold mb-5">Category: Top-importance articles</h4>

            <div class="row d-flex justify-content-center gap-4">
                <div class="col-md-5 img-container pt-5 text-light">
                    <div class="isi-content">
                        <span class="badge rounded-pill text-bg-warning text-white px-3 py-1">Badge</span>

                        <h2>Proses untuk Memantaskan Diri Menjadi Orang Tua Teladan</h2>
                        <p>Pola asuh sebagai sebuah proses bagaimana orang tua memperlakukan dan cara berinteraksi dengan
                            anak didalamnya meliputi aktivitas yang bersifat ...</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row  d-flex justify-content-center">
                        <div class="col-md-6 bg-warning img-container2">
                            <div class="isi-content2">

                                <span class="badge rounded-pill mb-2 text-bg-warning text-white px-3 py-1">Badge</span>

                                <h6>Proses untuk </h6>
                            </div>
                        </div>
                        <div class="col-md-6 bg-warning img-container2">
                            <div class="isi-content2">

                                <span class="badge rounded-pill mb-2 text-bg-warning text-white px-3 py-1">Badge</span>

                                <h6>Proses untuk </h6>
                            </div>
                        </div>
                        <div class="col-md-12 bg-danger img-container3 mt-5">
                            <div class="isi-content2">

                                <span class="badge rounded-pill mb-2 text-bg-warning text-white px-3 py-1">Badge</span>

                                <h4>Proses untuk Memantaskan Diri </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shadow-lg mb-5">
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <h1 class="text-success fw-bold mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur, modi similique animi
                        maiores quia facilis ex velit voluptates quae alias unde explicabo perferendis expedita quo eum?
                        Corrupti quasi nostrum, doloremque sunt odit exercitationem! Culpa dolorum atque itaque animi
                        facilis officiis velit, minima obcaecati odio, quia aut quam suscipit laudantium natus t...</p>
                    <button class="btn btn-login px-2 mt-3 text-white">Selengkapnya</button>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('image/cipung.png') }}" alt="Hero Image" class="img-fluid rounded" width="100%">
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="bg-success vh-100">
        <div class="container py-5 text-white fw-bold">
            <h2 class="text-center">
                Testimoni
            </h2>
        </div>
    </section> --}}
@endsection
