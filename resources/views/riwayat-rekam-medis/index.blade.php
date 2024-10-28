@extends('layouts.landingpage')

@section('content')
    <div style="height: 90px;" class="p"></div>
    <div class="container my-5 p-4">
        <h2 class="fw-bold mb-4">Rekam Medis</h2>

        <div class="card shadow border-0">
            <div class="card-body">

<!-- tabel anak -->
<div class="card shadow border-primary rounded-4 ">
            <div class="card-body">
                <table class="table table-hovered">
                    <thead>
                        <tr>
                        <th>No</th>
                            <th>Nama Ibu</th>
                            <th>Nama Anak</th>
                            <th>Imunisasi</th>
                            <th>Tanggal</th>
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
                                                <p>{{ $imunisasiItem['nama'] }}</p>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Data tidak tersedia</p>
                                    @endif
                                </td>
                                <td>
                                    @if (is_array($item->imunisasi))
                                        <ul>
                                            @foreach ($item->imunisasi as $imunisasiItem)
                                                <p>{{ $imunisasiItem['tanggal'] }}</p>
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
                                                <p>{{ $penyakitItem }}</p>
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
                                                <p>{{ $alergiItem }}</p>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Data tidak tersedia</p>
                                    @endif
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
 <!-- end table anak -->
            </div>
        </div>
    </div>
@endsection
