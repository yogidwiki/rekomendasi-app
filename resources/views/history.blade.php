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
                    <table class="table table-hovered" id="dataTables">
                        <thead>
                            <tr>
                                <th>Nama Makanan</th>
                                <th>Gambar</th>
                                <th>Resep & Bahan</th>
                                <th>Kalori</th>
                                <th>Kriteria</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatRekomendasi as $rekomendasi)
                                @if (is_array($rekomendasi->rekomendasi))
                                    @foreach ($rekomendasi->rekomendasi as $item)
                                        <tr>
                                            <td>{{ $item['nama_makanan'] ?? 'Tidak diketahui' }}</td>
                                            <td>
                                            @if (!empty($item['gambar']))
                                             <img src="{{ asset('makanan-images/'.$item['gambar']) }}" alt="{{ $item['nama_makanan'] }}" style="width: 100px; height: auto;">
                                            @else
                                                Tidak ada gambar
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#resepModal{{ $loop->parent->iteration }}{{ $loop->iteration }}">Lihat Resep dan Bahan</button>
                                            </td>
                                            <td>{{ $item['kalori'] ?? 'Tidak diketahui' }}</td>
                                            <td>
                                                <ul>
                                                    <li>Umur(bulan): {{ $rekomendasi->kriteria['umur'] ?? 'Tidak diketahui' }}</li>
                                                    <li>Berat Badan: {{ $rekomendasi->kriteria['berat_badan'] ?? 'Tidak diketahui' }}</li>
                                                    <li>Tinggi Badan: {{ $rekomendasi->kriteria['tinggi_badan'] ?? 'Tidak diketahui' }}</li>
                                                    <li>Jenis Kelamin: {{ $rekomendasi->kriteria['jenis_kelamin'] ?? 'Tidak diketahui' }}</li>
                                                    <li>Aktivitas Fisik: {{ $rekomendasi->kriteria['aktivitas_fisik'] ?? 'Tidak diketahui' }}</li>
                                                </ul>
                                            </td>
                                            <td>{{ $rekomendasi['created_at']->format('d M Y H:i') }}</td>
                                        </tr>

                                        <!-- Resep dan Bahan Modal -->
                                        <div class="modal fade" id="resepModal{{ $loop->parent->iteration }}{{ $loop->iteration }}" tabindex="-1" aria-labelledby="resepModalLabel{{ $loop->parent->iteration }}{{ $loop->iteration }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="resepModalLabel{{ $loop->parent->iteration }}{{ $loop->iteration }}">Resep dan Bahan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><strong>Resep:</strong></h6>
                                                        <p>{{ $item['resep'] ?? 'Tidak tersedia' }}</p>
                                                        <h6><strong>Bahan:</strong></h6>
                                                        <p>{{ $item['bahan'] ?? 'Tidak tersedia' }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
