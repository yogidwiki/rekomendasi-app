@extends('layouts.landingpage')
@section('css')
<style>
        .card {
            width: 100%;
            height: 60%;
            color: rgb(33, 33, 33);
            box-shadow: rgba(0, 0, 0, 0.2) 0px 18px 50px -10px;
            border: none;
            overflow: hidden;
            transition: .3s ease-in-out;
            border-radius: 18px;
            cursor: pointer;
            
        }

        .card:hover{
            background-color: #5dd485;
            color: white;
            transform: scale(1.05);
        }
        .nomer{
            height: 50px;
            width: 50px;
            border-radius: 100%;
            padding: 10px;
            color: white;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-md-6">
            <div>
            <h2  class="fw-bold text-success">Kenapa sih Harus Test Parenting?</h2>
                <p class= "isi"  >melalui test parenting, kita dapat mengevaluasi  pendekatan pengasuhan yang telah kita terapkan  dan mengidentifikasi area yang perlu diperbaiki,  sehingga kita dapat menjadi orang tua yang lebih  baik dan memberikan dukungan yang optimal bagi  perkembangan anak-anak kita. Test parenting juga  membantu kita memahami bagaimana merespons  situasi dan tantangan dalam mengasuh anak  dengan bijaksana dan penuh empati.</p>
            </div>
            <div class="col-sm-6">
                <!-- Tombol dengan warna primary -->
                <a href="#tutorial" class="btn btn-login btn-secondary px-3">Tutorial  <i class="bi bi-arrow-down-short"></i></a>
            </div>
            </div>
            <div class="col-md-6">
                <!-- Kolom kanan dengan gambar -->
                <img src="{{asset('image/parenthero.png')}}" style="width: 100%;" alt="Gambar">
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center ">
        <div class="col-md-8 ">
            <p><i class="bi bi-chat-square-quote-fill text-danger fs-3 mx-3"></i>Test parenting juga membantu kita memahami cara merespons situasi dan tantangan dalam mengasuh anak . Dengan bijaksana dan penuh empati karena setiap anak memiliki cara berfikir yang berbeda-beda.<i class="bi bi-chat-square-quote-fill mx-3 fs-3 text-danger"></i><span class="fw-bold text-secondary">~ Hifni Sadboy</span></p>
            

        </div>
    </div>

    <div class="container my-4 py-5" id="tutorial">
        <h2 class="text-center fw-bold mb-5 text-success">Cara Mengerjakan Test <hr></h2>
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-md-4">
                
                <!-- Kartu 1 -->
                <div class="d-flex justify-content-center">
                    <p class="text-center nomer bg-success">1</p>
                </div>
                <div class="card px-3 ">
                    <div class="card-body text-center ">
                        <h5 class="card-title fw-semibold ">Persiapan:</h5>
                        <p>Persiapkan waktu dan lingkungan yang tenang.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center">
                    <p class="text-center nomer bg-success">2</p>
                </div>
                <!-- Kartu 2 -->
                <div class="card ">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">Instruksi: </h5>
                        <p>Baca instruksi dengan cermat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center">
                    <p class="text-center nomer bg-success">3</p>
                </div>
                <!-- Kartu 3 -->
                <div class="card ">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">Jujur:</h5>
                        <p>Fokus dan jujur dalam menjawab.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="d-flex justify-content-center">
                    <p class="text-center nomer bg-success">4</p>
                </div>
                <!-- Kartu 1 -->
                <div class="card ">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">Jawaban:</h5>
                        <p>Tidak ada jawaban benar atau salah.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center">
                    <p class="text-center nomer bg-success">5</p>
                </div>
                <!-- Kartu 2 -->
                <div class="card ">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">Fokus:</h5>
                        <p>Prioritaskan perspektif sebagai orang tua.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center">
                    <p class="text-center nomer bg-success">6</p>
                </div>
                <!-- Kartu 3 -->
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold">Review:</h5>
                        <p>Review jawaban sebelum mengirimkan.</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mt-5 ">
                    <div class="text-center"> 
                        <button class="btn btn-login btn-success">
                            Mulai Test  <i class="bi bi-play-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
    
    <div class="bg-danger">
        <div class="text-center p-3 text-white container">
            <h1 class="my-3 fw-bold">ALERT!</h1>
            <p class="mb-3">
                Test ini tidak dapat dijadikan acuan secara 100% dalam menilai kemampuan atau kepribadian seseorang sebagai orang tua. Setiap orang tua memiliki latar belakang, nilai-nilai, dan pengalaman yang berbeda-beda. Namun, test parenting dapat memberikan bantuan dalam memberikan saran atau panduan dalam memahami potensi kekuatan dan kelemahan sebagai orang tua. Hasil dari test ini dapat menjadi awal untuk merefleksikan pendekatan dan pola asuh yang mungkin perlu ditingkatkan atau disesuaikan demi kesejahteraan dan perkembangan anak. Penting untuk diingat bahwa menjadi orang tua adalah proses belajar yang berkesinambungan, dan setiap orang tua dapat belajar dan berkembang dari pengalaman sehari-hari bersama anak.
            </p>
    </div>
        
    </div>
@endsection