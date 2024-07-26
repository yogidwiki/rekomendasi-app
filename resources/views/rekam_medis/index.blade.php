@extends('layouts.dashboard')
@section('title', 'Data Rekam Medis')
@section('content')
    <div class="card shadow border-0">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah
                Rekam Medis</button>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ibu</th>
                        <th>Nama Anak</th>
                        <th>Imunisasi</th>
                        <th>Riwayat Penyakit</th>
                        <th>Alergi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekamMedis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->orangTua->nama_ibu }}</td>
                            <td>{{ $item->anak->nama_lengkap }}</td>
                            <td>
                                @if (is_array($item->imunisasi))
                                    <ul>
                                        @foreach ($item->imunisasi as $imunisasiItem)
                                            <li>{{ $imunisasiItem['nama'] }} - {{ $imunisasiItem['tanggal'] }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Data tidak tersedia</p>
                                @endif
                            </td>

                            <td>
                                @if (is_array($item->riwayat_penyakit))
                                    <ul>
                                        @foreach ($item->riwayat_penyakit as $penyakitItem)
                                            <li>{{ $penyakitItem }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Data tidak tersedia</p>
                                @endif
                            </td>
                            <td>
                                @if (is_array($item->alergi))
                                    <ul>
                                        @foreach ($item->alergi as $alergiItem)
                                            <li>{{ $alergiItem }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Data tidak tersedia</p>
                                @endif
                            </td>
                            <td>
                                <!-- Tambahkan tombol edit dan hapus jika diperlukan -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Rekam Medis Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Rekam Medis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('rekam-medis.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="orang_tua_id" class="form-label">Nama Ibu</label>
                            <select class="form-select" id="orang_tua_id" name="orang_tua_id" required>
                                <option value="">Pilih Nama Ibu</option>
                                @foreach ($orangTua as $ot)
                                    <option value="{{ $ot->id }}">{{ $ot->nama_ibu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="anak_id" class="form-label">Nama Anak</label>
                            <select class="form-select" id="anak_id" name="anak_id" required>
                                <option value="">Pilih Nama Anak</option>
                                <!-- Opsi anak akan diisi oleh JavaScript -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imunisasi" class="form-label">Imunisasi</label>
                            <div id="imunisasi-wrapper">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="imunisasi[]" placeholder="Imunisasi">
                                    <input type="date" class="form-control" name="tanggal_imunisasi[]">
                                    <button type="button" class="btn btn-danger remove-input"
                                        data-group="imunisasi">Hapus</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-sm mt-2" id="add-imunisasi">Tambah
                                Imunisasi</button>
                        </div>

                        <div class="mb-3">
                            <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                            <div id="riwayat-p Penyakit-wrapper">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="riwayat_penyakit[]"
                                        placeholder="Riwayat Penyakit">
                                    <button type="button" class="btn btn-danger remove-input"
                                        data-group="riwayat_penyakit">Hapus</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-sm mt-2" id="add-riwayat-p Penyakit">Tambah
                                Riwayat Penyakit</button>
                        </div>
                        <div class="mb-3">
                            <label for="alergi" class="form-label">Alergi</label>
                            <div id="alergi-wrapper">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="alergi[]" placeholder="Alergi">
                                    <button type="button" class="btn btn-danger remove-input"
                                        data-group="alergi">Hapus</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-sm mt-2" id="add-alergi">Tambah Alergi</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orangTuaSelect = document.getElementById('orang_tua_id');
    const anakSelect = document.getElementById('anak_id');

    orangTuaSelect.addEventListener('change', function() {
        const orangTuaId = this.value;
        if (orangTuaId) {
            // Manually construct the URL
            const url = `/anakshow/${orangTuaId}`;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log('Response Data:', data);

                    anakSelect.innerHTML = '<option value="">Pilih Nama Anak</option>';

                    if (Array.isArray(data)) {
                        data.forEach(anak => {
                            anakSelect.innerHTML +=
                                `<option value="${anak.id}">${anak.nama_lengkap}</option>`;
                        });
                    } else {
                        console.error('Unexpected data format:', data);
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            anakSelect.innerHTML = '<option value="">Pilih Nama Anak</option>';
        }
    });

            // Handle add and remove input fields dynamically
            function setupInputRemoval() {
                document.querySelectorAll('.remove-input').forEach(button => {
                    button.addEventListener('click', function() {
                        const group = this.getAttribute('data-group');
                        this.parentElement.remove();
                    });
                });
            }

            setupInputRemoval();

            document.getElementById('add-imunisasi').addEventListener('click', function() {
                const wrapper = document.getElementById('imunisasi-wrapper');
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" class="form-control" name="imunisasi[]" placeholder="Imunisasi">
                    <input type="date" class="form-control" name="tanggal_imunisasi[]">
                    <button type="button" class="btn btn-danger remove-input" data-group="imunisasi">Hapus</button>
                `;
                wrapper.appendChild(newInput);
                setupInputRemoval();
            });

            document.getElementById('add-riwayat-p Penyakit').addEventListener('click', function() {
                const wrapper = document.getElementById('riwayat-p Penyakit-wrapper');
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" class="form-control" name="riwayat_penyakit[]" placeholder="Riwayat Penyakit">
                    <button type="button" class="btn btn-danger remove-input" data-group="riwayat_penyakit">Hapus</button>
                `;
                wrapper.appendChild(newInput);
                setupInputRemoval();
            });

            document.getElementById('add-alergi').addEventListener('click', function() {
                const wrapper = document.getElementById('alergi-wrapper');
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" class="form-control" name="alergi[]" placeholder="Alergi">
                    <button type="button" class="btn btn-danger remove-input" data-group="alergi">Hapus</button>
                `;
                wrapper.appendChild(newInput);
                setupInputRemoval();
            });
        });
    </script>
@endsection
