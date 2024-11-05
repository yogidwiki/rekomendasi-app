@extends('layouts.dashboard')
@section('title', 'Data Rekam Medis')
@section('content')
<div class="card shadow border-0">
    <div class="card-body">
        <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary mb-3">Tambah
            Rekam Medis</a>
        <table class="table" id="dataTables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ibu</th>
                    <th>Nama Anak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekamMedisUnik as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('users.show', $item->orangTua->user_id) }}" class="menu-link">
                                {{ $item->orangTua->nama_ibu }}
                            </a>
                        </td>
                        <td>
                            <!-- Trigger modal on click -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->anak->id }}" class="menu-link">
                                {{ $item->anak->nama_lengkap }}
                            </a>
                        </td>
                        <td>
                            <div class="">
                                <a href="{{ route('rekam-medis.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('rekam-medis.destroy', $item->id) }}" method="POST"
                                    style="display:inline;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Template for Each Child -->
        @foreach ($rekamMedisUnik as $item)
                <div class="modal fade" id="modalDetail{{ $item->anak->id }}" tabindex="-1"
                    aria-labelledby="modalLabel{{ $item->anak->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $item->anak->id }}">Detail Rekam Medis -
                                    {{ $item->anak->nama_lengkap }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @php
                                    $recordsForChild = $rekamMedis->where('anak.id', $item->anak->id);
                                @endphp
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        
                                            <h6>Data Rekam Medis untuk {{ $item->anak->nama_lengkap }}</h6>

                                            <table class="table" id="dataTables">
                                                <thead>
                                                    <tr>
                                                        <th>Imunisasi</th>
                                                        <th>Tanggal Rekam Medis</th>
                                                        <th>Riwayat Penyakit</th>
                                                        <th>Alergi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($recordsForChild as $record)
                                                        <tr>
                                                            <!-- Imunisasi -->
                                                            <td>
                                                                @if (is_array($record->imunisasi) && count($record->imunisasi) > 0)
                                                                    <ul class="list-unstyled">
                                                                        @foreach ($record->imunisasi as $imunisasiItem)
                                                                            <li>{{ $imunisasiItem['nama'] }} ({{ $imunisasiItem['tanggal'] }})</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                    <p>Data tidak tersedia</p>
                                                                @endif
                                                            </td>
                                                            <td>{{ $record->created_at->format('d-m-Y') }}</td>
                                                            <!-- Riwayat Penyakit -->
                                                            <td>
                                                                @if (is_array($record->riwayat_penyakit) && count($record->riwayat_penyakit) > 0)
                                                                    <ul class="list-unstyled">
                                                                        @foreach ($record->riwayat_penyakit as $penyakitItem)
                                                                            <li>{{ $penyakitItem }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                    <p>Data tidak tersedia</p>
                                                                @endif
                                                            </td>

                                                            <!-- Alergi -->
                                                            <td>
                                                                @if (is_array($record->alergi) && count($record->alergi) > 0)
                                                                    <ul class="list-unstyled">
                                                                        @foreach ($record->alergi as $alergiItem)
                                                                            <li>{{ $alergiItem }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                    <p>Data tidak tersedia</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="">
                                                                    <a href="{{ route('rekam-medis.edit', $item->id) }}"
                                                                        class="btn btn-warning btn-sm">
                                                                        Edit
                                                                    </a>
                                                                    <form action="{{ route('rekam-medis.destroy', $item->id) }}"
                                                                        method="POST" style="display:inline;" class="delete-form">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

    </div>
</div>

@endsection
<style>
    .menu-link {
        color: black;
        /* Ubah warna teks */
        text-decoration: none;
        /* Hilangkan garis bawah */
    }

    .menu-link:hover {
        color: #007bff;
        /* Warna ketika di-hover */
        text-decoration: underline;
        /* Gaya ketika di-hover */
    }
</style>