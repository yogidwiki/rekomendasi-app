@extends('layouts.landingpage')

@section('content')
    <div style="height: 90px;" class="p"></div>
    <div class="container my-5 p-4">
        <h2 class="fw-bold mb-4">Daftar Anak</h2>

        <button type="button" class="btn btn-primary mb-3 rounded-5" data-bs-toggle="modal" data-bs-target="#addAnakModal">
            <i class="bi bi-plus"></i> Tambah Anak
        </button>

        <div class="card shadow border-primary rounded-4 ">
            <div class="card-body">
                <table class="table table-hovered">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Golongan Darah</th>
                            <th>Berat Lahir</th>
                            <th>Tinggi Lahir</th>
                            <th>Lingkar Kepala Lahir</th>
                            <th>Anak Ke</th>
                            <th>Kondisi Kesehatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anak as $a)
                            <tr>
                                <td>{{ $a->nama_lengkap }}</td>
                                <td>{{ $a->tanggal_lahir }}</td>
                                <td>{{ $a->jenis_kelamin }}</td>
                                <td>{{ $a->golongan_darah }}</td>
                                <td>{{ $a->berat_lahir }} Kg</td>
                                <td>{{ $a->tinggi_lahir }} Cm</td>
                                <td>{{ $a->lingkar_kepala_lahir }} Cm</td>
                                <td>{{ $a->anak_ke }}</td>
                                <td>{{ $a->kondisi_kesehatan }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-warning btn-sm rounded-5" data-bs-toggle="modal"
                                            data-bs-target="#editAnakModal{{ $a->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form action="{{ route('hapus.anak', $a->id) }}"  method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
        
                            <!-- Edit Anak Modal -->
                            <div class="modal fade" id="editAnakModal{{ $a->id }}" tabindex="-1" aria-labelledby="editAnakModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAnakModalLabel">Edit Anak</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('update.anak', $a->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="edit_nama_lengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="edit_nama_lengkap"
                                                        name="nama_lengkap" value="{{ $a->nama_lengkap }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="edit_tanggal_lahir"
                                                        name="tanggal_lahir" value="{{ $a->tanggal_lahir }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin" required>
                                                        <option value="Laki-laki" {{ $a->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ $a->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_golongan_darah" class="form-label">Golongan Darah</label>
                                                    <input type="text" class="form-control" id="edit_golongan_darah"
                                                        name="golongan_darah" value="{{ $a->golongan_darah }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_berat_lahir" class="form-label">Berat Lahir (kg)</label>
                                                    <input type="number" step="0.1" class="form-control" id="edit_berat_lahir"
                                                        name="berat_lahir" value="{{ $a->berat_lahir }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_tinggi_lahir" class="form-label">Tinggi Lahir (cm)</label>
                                                    <input type="number" step="0.1" class="form-control" id="edit_tinggi_lahir"
                                                        name="tinggi_lahir" value="{{ $a->tinggi_lahir }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_lingkar_kepala_lahir" class="form-label">Lingkar Kepala Lahir (cm)</label>
                                                    <input type="number" step="0.1" class="form-control" id="edit_lingkar_kepala_lahir"
                                                        name="lingkar_kepala_lahir" value="{{ $a->lingkar_kepala_lahir }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_anak_ke" class="form-label">Anak Ke-</label>
                                                    <input type="number" class="form-control" id="edit_anak_ke" name="anak_ke"
                                                        value="{{ $a->anak_ke }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_kondisi_kesehatan" class="form-label">Kondisi Kesehatan</label>
                                                    <textarea class="form-control" id="edit_kondisi_kesehatan" name="kondisi_kesehatan" required>{{ $a->kondisi_kesehatan }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Anak Modal -->
    <div class="modal fade" id="addAnakModal" tabindex="-1" aria-labelledby="addAnakModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAnakModalLabel">Tambah Anak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambah.anak') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="golongan_darah" class="form-label">Golongan Darah</label>
                            <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" required>
                        </div>
                        <div class="mb-3">
                            <label for="berat_lahir" class="form-label">Berat Lahir (kg)</label>
                            <input type="number" step="0.1" class="form-control" id="berat_lahir" name="berat_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="tinggi_lahir" class="form-label">Tinggi Lahir (cm)</label>
                            <input type="number" step="0.1" class="form-control" id="tinggi_lahir" name="tinggi_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="lingkar_kepala_lahir" class="form-label">Lingkar Kepala Lahir (cm)</label>
                            <input type="number" step="0.1" class="form-control" id="lingkar_kepala_lahir" name="lingkar_kepala_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="anak_ke" class="form-label">Anak Ke-</label>
                            <input type="number" class="form-control" id="anak_ke" name="anak_ke" required>
                        </div>
                        <div class="mb-3">
                            <label for="kondisi_kesehatan" class="form-label">Kondisi Kesehatan</label>
                            <textarea class="form-control" id="kondisi_kesehatan" name="kondisi_kesehatan" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
