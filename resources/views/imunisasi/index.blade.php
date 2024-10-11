@extends('layouts.dashboard')
@section('title', 'Jadwal Imunisasi')
@section('content')
    <div class="card shadow border-0">
        <div class="card-body">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Jadwal Imunisasi</button>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Imunisasi</th>
                        <th>Tanggal Imunisasi</th>
                        <th>Tempat Imunisasi</th>
                        <th>Usia Bulan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($imunisasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_imunisasi }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_imunisasi)->format('d-m-Y') }}</td>

                        <td>{{ $item->tempat_imunisasi }}</td>
                        <td>{{ $item->usia_bulan }}</td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                            <form action="{{ route('imunisasi.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Jadwal Imunisasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('imunisasi.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nama_imunisasi" class="form-label">Nama Imunisasi</label>
                                            <input type="text" class="form-control" id="nama_imunisasi" name="nama_imunisasi" value="{{ $item->nama_imunisasi }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_imunisasi" class="form-label">Tanggal Imunisasi</label>
                                            <input type="date" class="form-control" id="tanggal_imunisasi" name="tanggal_imunisasi" value="{{ $item->tanggal_imunisasi }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_imunisasi" class="form-label">Tempat Imunisasi</label>
                                            <input type="text" class="form-control" id="tempat_imunisasi" name="tempat_imunisasi" value="{{ $item->tempat_imunisasi }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="usia_bulan" class="form-label">Usia Bulan</label>
                                            <input type="number" class="form-control" id="usia_bulan" name="usia_bulan" value="{{ $item->usia_bulan }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Jadwal Imunisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('imunisasi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_imunisasi" class="form-label">Nama Imunisasi</label>
                            <input type="text" class="form-control" id="nama_imunisasi" name="nama_imunisasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_imunisasi" class="form-label">Tanggal Imunisasi</label>
                            <input type="date" class="form-control" id="tanggal_imunisasi" name="tanggal_imunisasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_imunisasi" class="form-label">Tempat Imunisasi</label>
                            <input type="text" class="form-control" id="tempat_imunisasi" name="tempat_imunisasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="usia_bulan" class="form-label">Usia Bulan</label>
                            <input type="number" class="form-control" id="usia_bulan" name="usia_bulan" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
