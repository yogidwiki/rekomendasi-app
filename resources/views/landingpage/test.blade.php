@extends('layouts.landingpage')
@section('css')
<style>
        
        .judul {
        color: #659384;
        font-size: 70px;
        font-family: Poppins;
        font-weight: 800;
        word-wrap: break-word
        }

        .isi {
        color: #585858;
        font-size: 20px;
        font-family: Poppins;
        font-weight: 500;
        line-height: 39.10px;
        word-wrap: break-word
        }

        .btn {
            border-radius: 22px;            color: white;
            font-size: 20px;
            font-family: Poppins;
            font-weight: 500;
            word-wrap: break-word
        }

        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 40vh; /* Atur tinggi sesuai dengan kebutuhan Anda */
            color: #585858;
            font-size: 20px;
            font-family: Poppins;
            font-weight: 400;
            line-height: 39.10px;
            word-wrap: break-word
        } 

        .card {
            width: 300px;
            height: 320px;
            background-color: #659384;
        }

        .card-title {
        padding-top: 18px;
        color: white;
        font-size: 15px;
        font-family: Poppins;
        font-weight: 700;
        line-height: 29.32px;
        word-wrap: break-word;
        text-align: center;
        }

        .card-text {
        padding-top: 18px;
        color: white;
        font-size: 15px;
        font-family: Poppins;
        font-weight: 400;
        line-height: 29.32px;
        word-wrap: break-word;
        text-align: center;
        }
        
    </style>
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 ">
            <div class="col-md-6">
            <div>
            <h2  class="judul">Judul Konten</h2>
                <p class= "isi">melalui test parenting, kita dapat mengevaluasi  pendekatan pengasuhan yang telah kita terapkan  dan mengidentifikasi area yang perlu diperbaiki,  sehingga kita dapat menjadi orang tua yang lebih  baik dan memberikan dukungan yang optimal bagi  perkembangan anak-anak kita. Test parenting juga  membantu kita memahami bagaimana merespons  situasi dan tantangan dalam mengasuh anak  dengan bijaksana dan penuh empati.</p>
            </div>
            <div class="col-sm-6">
                <!-- Tombol dengan warna primary -->
                <button class="btn btn-warning px-3">Pengertian</button>
            </div>
            </div>
            <div class="col-md-6">
                <!-- Kolom kanan dengan gambar -->
                <img src="{{asset('image/parenthero.png')}}" alt="Gambar">
            </div>
        </div>
    </div>

    <p class="center-content">Test parenting juga membantu kita memahami cara merespons situasi dan tantangan dalam mengasuh anak <br> dengan bijaksana dan penuh empati. Hal ini penting karena setiap anak memiliki cara berfikir dan mungkin <br> menghadapi masalah yang berbeda-beda. Dengan memiliki pengetahuan dan keterampilan yang tepat, <br> kita dapat memberikan dukungan yang optimal bagi perkembangan fisik, emosional, dan sosial anak-anak kita.</p>

    <div class="container my-4 py-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Kartu 1 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Membentuk Perilaku dan Nilai</h5>
                        <p class="card-text">Orang tua memainkan peran utama dalam membentuk nilai-nilai dan moral anak-anak, membantu mereka memahami perbedaan antara benar dan salah, dan mengajarkan etika dalam interaksi dengan orang lain.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Kartu 2 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Kesehatan Mental dan Emosional</h5>
                        <p class="card-text">Dukungan dan cinta dari orang tua menciptakan lingkungan yang stabil dan aman bagi perkembangan kesehatan jiwa anak-anak.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Kartu 3 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Membantu Mengatasi Tantangan</h5>
                        <p class="card-text">Parenting yang baik membantu anak-anak dalam menghadapi tantangan hidup, membangun keterampilan coping, dan belajar dari pengalaman. Agar perccaya diri dan berani mengambil keputusan.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-4 my-4">
            <div class="col-md-4">
                <!-- Kartu 1 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Membentuk Perilaku dan Nilai</h5>
                        <p class="card-text">Orang tua memainkan peran utama dalam membentuk nilai-nilai dan moral anak-anak, membantu mereka memahami perbedaan antara benar dan salah, dan mengajarkan etika dalam interaksi dengan orang lain.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Kartu 2 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> Kesehatan Mental dan Emosional</h5>
                        <p class="card-text">Dukungan dan cinta dari orang tua menciptakan lingkungan yang stabil dan aman bagi perkembangan kesehatan jiwa anak-anak.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Kartu 3 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Membantu Mengatasi Tantangan</h5>
                        <p class="card-text">Parenting yang baik membantu anak-anak dalam menghadapi tantangan hidup, membangun keterampilan coping, dan belajar dari pengalaman. Agar perccaya diri dan berani mengambil keputusan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-danger">
        <div class="text-center p-5 text-white container">
            <h1 class="mb-5">be the best parentinghow’s you want!</h1>
            <p class="mb-5">
            Parenting adalah seni dalam mencari keseimbangan antara melindungi anak-anak kita dan membiarkan mereka menjalani pengalaman hidup mereka sendiri. Kita mengajarkan mereka untuk bertahan dalam keadaan sulit, tetapi juga memberi mereka kepercayaan diri untuk menjelajahi dunia. Kita mengamati dengan bangga setiap langkah pertumbuhan mereka, menyaksikan mereka menemukan tujuan hidup dan mengejar impian mereka dengan penuh semangat. Sepanjang perjalanan ini, kita belajar tentang kesabaran, ketekunan, dan arti cinta yang tulus.
            </p>
            <button class="btn btn-warning">
                More Info
            </button>
    </div>
        
    </div>
@endsection