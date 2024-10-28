@extends('layouts.dashboard')

@section('title', 'Edit Rekam Medis')

@section('content')
    <div class="card shadow border-0">
        <div class="card-body">
            <form action="{{ route('rekam-medis.update', $rekamMedis->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="orang_tua_id" class="form-label">Nama Ibu</label>
                        <select class="form-select" id="orang_tua_id" name="orang_tua_id" required>
                            <option value="">Pilih Nama Ibu</option>
                            @foreach ($orangTua as $ot)
                                <option value="{{ $ot->id }}" {{ $ot->id == $rekamMedis->orang_tua_id ? 'selected' : '' }}>
                                    {{ $ot->nama_ibu }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="anak_id" class="form-label">Nama Anak</label>
                        <select class="form-select" id="anak_id" name="anak_id" required>
                            <option value="">Pilih Nama Anak</option>
                            @foreach ($anak as $a)
                                <option value="{{ $a->id }}" {{ $a->id == $rekamMedis->anak_id ? 'selected' : '' }}>
                                    {{ $a->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imunisasi" class="form-label">Imunisasi</label>
                        <div id="imunisasi-wrapper">
                            @foreach (json_decode($rekamMedis->imunisasi, true) as $imunisasiItem)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="imunisasi[]" value="{{ $imunisasiItem['nama'] }}" placeholder="Imunisasi">
                                    <input type="date" class="form-control" name="tanggal_imunisasi[]" value="{{ $imunisasiItem['tanggal'] }}">
                                    <button type="button" class="btn btn-danger remove-input" data-group="imunisasi">Hapus</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-info btn-sm mt-2" id="add-imunisasi">Tambah Imunisasi</button>
                    </div>

                    <div class="mb-3">
                        <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                        <div id="riwayat-p Penyakit-wrapper">
                            @foreach (json_decode($rekamMedis->riwayat_penyakit, true) as $penyakitItem)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="riwayat_penyakit[]" value="{{ $penyakitItem }}" placeholder="Riwayat Penyakit">
                                    <button type="button" class="btn btn-danger remove-input" data-group="riwayat_penyakit">Hapus</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-info btn-sm mt-2" id="add-riwayat-p Penyakit">Tambah Riwayat Penyakit</button>
                    </div>

                    <div class="mb-3">
                        <label for="alergi" class="form-label">Alergi</label>
                        <select class="form-select" id="alergi" name="alergi[]" multiple="multiple" style="width: 100%;">
                            <option value="Tidak ada" {{ in_array('Tidak ada', json_decode($rekamMedis->alergi, true)) ? 'selected' : '' }}>Tidak ada</option>
                            <option value="Daging" {{ in_array('Daging', json_decode($rekamMedis->alergi, true)) ? 'selected' : '' }}>Daging</option>
                            <option value="Serbuk Sari" {{ in_array('Serbuk Sari', json_decode($rekamMedis->alergi, true)) ? 'selected' : '' }}>Serbuk Sari</option>
                            <option value="Kacang" {{ in_array('Kacang', json_decode($rekamMedis->alergi, true)) ? 'selected' : '' }}>Kacang</option>
                            <option value="Susu" {{ in_array('Susu', json_decode($rekamMedis->alergi, true)) ? 'selected' : '' }}>Susu</option>
                            <option value="Obat-obatan" {{ in_array('Obat-obatan', json_decode($rekamMedis->alergi, true)) ? 'selected' : '' }}>Obat-obatan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#alergi').select2({
                placeholder: "Pilih Alergi",
                allowClear: true
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
        });
    </script>
@endsection
