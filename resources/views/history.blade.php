@extends('layouts.landingpage')

@section('content')

    <div style="height: 90px"></div>
    <div class="container py-5">

        <h3 class="fw-bold text-primary mb-3">Riwayat Rekomendasi</h3>
        @if ($riwayatRekomendasi->isEmpty())
            <p>Tidak ada rekomendasi.</p>
        @else
            <div class="card shadow border-primary rounded-4">
                <div class="card-body">
                    <table class="table table-hovered " id="dataTables">
                        <thead>
                            <tr>
                                <th>Nama Makanan</th>
                                <th>Gambar</th>
                                <th>Resep</th>
                                <th>Kalori</th>
                                <th>Bahan</th>
                                <th>Kriteria</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatRekomendasi as $rekomendasi)
                                @if (is_array($rekomendasi['rekomendasi']))
                                    @foreach ($rekomendasi['rekomendasi'] as $item)
                                        <tr>
                                            <td>{{ $item['nama_makanan'] }}</td>
                                            <td>
                                                @if (!empty($item['gambar']))
                                                    <img src="{{ asset('storage/' . $item['gambar']) }}" alt="{{ $item['nama_makanan'] }}" style="width: 100px; height: auto;">
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                            <td>{{ $item['resep'] }}</td>
                                            <td>{{ $item['kalori'] }}</td>
                                            <td>{{ $item['bahan'] }}</td>
                                            <td>
                                                <ul>
                                                    <li>Umur(bulan): {{ $rekomendasi->kriteria['umur'] }}</li>
                                                    <li>Berat Badan: {{ $rekomendasi->kriteria['berat_badan'] }}</li>
                                                    <li>Tinggi Badan: {{ $rekomendasi->kriteria['tinggi_badan'] }}</li>
                                                    <li>Jenis Kelamin: {{ $rekomendasi->kriteria['jenis_kelamin'] }}</li>
                                                    <li>Aktivitas Fisik: {{ $rekomendasi->kriteria['aktivitas_fisik'] }}</li>
                                                </ul>
                                            </td>
                                            <td>{{ $rekomendasi['created_at']->format('d M Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">Data tidak valid.</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

@endsection
