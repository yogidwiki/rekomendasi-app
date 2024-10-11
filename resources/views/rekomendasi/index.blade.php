@extends('layouts.landingpage')
@section('content')
    <div style="height: 90px;" class="p"></div>
    <div class="container my-5 p-4 min-vh-100">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h4 class="fw-semibold text-primary text-center mb-4">
                            Rekomendasi Makanan
                        </h4>
                        <div class="mb-3">
                            <label for="anak_id" class="form-label">Pilih Anak</label>
                            <select class="form-select" id="anak_id" name="anak_id" required>
                                <option value="">Pilih Nama Anak</option>
                                @foreach ($anak as $a)
                                    <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div id="data-anak">
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="umur" class="form-label">Umur(bulan)</label>
                                        <input type="text" id="umur" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <input type="text" id="jenis_kelamin" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="berat_badan" class="form-label">Berat Badan</label>
                                    <input type="number" id="berat_badan" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                    <input type="number" id="tinggi_badan" class="form-control">
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" id="tanggal" class="form-control" required>
                                </div> -->
                                <div class="mb-3">
                                    <label for="aktivitas_fisik" class="form-label">Aktivitas Fisik</label>
                                    <select class="form-select" id="aktivitas_fisik" name="aktivitas_fisik" required>
                                        <option value="">Pilih Aktivitas Fisik</option>
                                        <option value="rendah">Rendah</option>
                                        <option value="sedang">Sedang</option>
                                        <option value="tinggi">Tinggi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100 p-2" id="btn-submit">Cari Rekomendasi Makanan</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://u7.uidownload.com/vector/766/452/vector-eat-healthy-food-svg-eps.jpg" width="100%"
                    alt="">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const anakSelect = document.getElementById('anak_id');
            const dataAnakDiv = document.getElementById('data-anak');

            anakSelect.addEventListener('change', function() {
                const anakId = this.value;
                if (anakId) {
                    fetch(`/anak/${anakId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok.');
                            }
                            return response.json();
                        })
                        .then(data => {
                            const tanggalLahir = new Date(data.tanggal_lahir);
                            const umurBulan = calculateAgeInMonths(tanggalLahir);

                            document.getElementById('nama_lengkap').value = data.nama_lengkap || '';
                            document.getElementById('umur').value = umurBulan || '';
                            document.getElementById('jenis_kelamin').value = data.jenis_kelamin || '';
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    document.getElementById('nama_lengkap').value = '';
                    document.getElementById('umur').value = '';
                    document.getElementById('jenis_kelamin').value = '';
                }
            });

            function calculateAgeInMonths(birthDate) {
                const today = new Date();
                let ageMonths = today.getFullYear() * 12 + today.getMonth() - (birthDate.getFullYear() * 12 +
                    birthDate.getMonth());
                if (today.getDate() < birthDate.getDate()) {
                    ageMonths--;
                }
                return ageMonths;
            }

            document.getElementById('btn-submit').addEventListener('click', function() {
                const anakId = anakSelect.value;
                const beratBadan = document.getElementById('berat_badan').value;
                const tinggiBadan = document.getElementById('tinggi_badan').value;
                const aktivitasFisik = document.getElementById('aktivitas_fisik').value;
                const umur = document.getElementById('umur').value;
                const jenis_kelamin = document.getElementById('jenis_kelamin').value;
                if (anakId && beratBadan && tinggiBadan) {
                    window.location.href =
                        `/cari-rekomendasi?anak_id=${anakId}&berat_badan=${beratBadan}&tinggi_badan=${tinggiBadan}&umur=${umur}&jenis_kelamin=${jenis_kelamin}&aktivitas_fisik=${aktivitasFisik}`;
                } else {
                    alert('Pastikan semua field terisi!');
                }
            });
        });
    </script>
@endsection
