@extends('layouts.landingpage')

@section('content')
    <div style="height: 90px"></div>
    <div class="container my-5 p-4 min-vh-100">
        <h3 class="fw-bold text-primary text-center mb-4">Hasil Rekomendasi Makanan</h3>

        @if ($makanan->isEmpty())
            <div class="text-center">
                <img src="https://img.freepik.com/premium-vector/hand-drawn-no-data-illustration_23-2150696443.jpg?size=338&ext=jpg&ga=GA1.1.2008272138.1721606400&semt=ais_user"
                    alt="">
                <p>Tidak ada rekomendasi makanan yang sesuai dengan kebutuhan kalori Anda.</p>
                <p><strong>Kebutuhan Kalori:</strong> {{ $kalori }} kkal</p>
            </div>
        @else
            <div class="row">

                <p><strong>Kebutuhan Kalori persajian adalah:</strong> {{ round($kalori) }} kkal
            @if($kalori < 200)
            <span>
                (rendah)
            </span>
            @elseif($kalori >= 200 && $kalori <= 400)
            <span>
                (Sedang)
            </span>
            @else
            <span>
                (Tinggi)
            </span>
            @endif
            </p>
                @foreach ($makanan as $m)
                    <div class="col-md-12 my-4">
                        <div class="card shadow border-primary rounded-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('makanan-images/' . $m->gambar) }}"
                                        class="card-img-top rounded-4 m-4" alt="{{ $m->nama_makanan }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body m-3">
                                        <h5 class="fw-semibold">{{ $m->nama_makanan }}</h5>
                                        <div>
                                            @if ($m->is_alergi)
                                                <div class="alert alert-danger mt-2">
                                                    <strong> <i class="bi bi-exclamation-circle-fill"></i> Peringatan:</strong> Makanan ini mengandung bahan yang dapat
                                                    menyebabkan alergi pada anak. Bahan yang menyebabkan alergi:
                                                    <ul>
                                                        @foreach ($m->bahan_alergi as $bahan)
                                                            <li>{{ $bahan }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <table class="table table-hovered">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Kalori</th>
                                                    <td>: {{ $m->kalori }} kkal</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Resep</th>
                                                    <td>: {{ $m->resep }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Bahan</th>
                                                    <td>
                                                        : {{ $m->bahan }}

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
