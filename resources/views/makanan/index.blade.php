@extends('layouts.dashboard')
@section('title', 'Data Makanan')
@section('content')
    <div class="card shadow border-0">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Makanan</button>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Makanan</th>
                        <th>Resep</th>
                        <th>Bahan</th>
                        <th>Gambar</th>
                        <th>Kalori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($makanans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_makanan }}</td>
                            <td>{{ Str::limit($item->resep, 50) }}</td>
                            <td>{{ Str::limit($item->bahan, 50) }}</td>
                            <td><img src="{{ asset('makanan-images/' . $item->gambar) }}" width="100" alt="{{ $item->nama_makanan }}"></td>
                            <td>{{ $item->kalori }}</td>
                            <td>
                              <div class="d-flex gap-1">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">Detail</button>
                                <form action="{{ route('makanan.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus makanan ini?')">Hapus</button>
                                </form>
                              </div>
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('makanan.update', $item->id ) }}" method="POST" enctype="multipart/form-data" id="editForm{{ $item->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Makanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="edit_nama_makanan{{ $item->id }}" class="form-label">Nama Makanan</label>
                                                <input type="text" class="form-control" id="edit_nama_makanan{{ $item->id }}" name="nama_makanan" value="{{ $item->nama_makanan }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_resep{{ $item->id }}" class="form-label">Resep</label>
                                                <textarea class="form-control" id="edit_resep{{ $item->id }}" name="resep" required>{{ $item->resep }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_bahan{{ $item->id }}" class="form-label">Bahan</label>
                                                <textarea class="form-control" id="edit_bahan{{ $item->id }}" name="bahan" required>{{ $item->bahan }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_gambar{{ $item->id }}" class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="edit_gambar{{ $item->id }}" name="gambar">
                                                <img id="edit_preview_gambar{{ $item->id }}" src="{{ asset('makanan-images/' . $item->gambar) }}" width="100" alt="{{ $item->nama_makanan }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_kalori{{ $item->id }}" class="form-label">Kalori</label>
                                                <input type="number" class="form-control" id="edit_kalori{{ $item->id }}" name="kalori" value="{{ $item->kalori }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail Makanan: {{ $item->nama_makanan }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Resep</label>
                                            <p>{{ $item->resep }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bahan</label>
                                            <p>{{ $item->bahan }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Gambar</label>
                                            <img src="{{ asset('makanan-images/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->nama_makanan }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kalori</label>
                                            <p>{{ $item->kalori }} Kcal</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('makanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Makanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_makanan" class="form-label">Nama Makanan</label>
                            <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" required>
                        </div>
                        <div class="mb-3">
                            <label for="resep" class="form-label">Resep</label>
                            <textarea class="form-control" id="resep" name="resep" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="bahan" class="form-label">Bahan</label>
                            <textarea class="form-control" id="bahan" name="bahan" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="mb-3">
                            <label for="kalori" class="form-label">Kalori</label>
                            <input type="number" class="form-control" id="kalori" name="kalori" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
