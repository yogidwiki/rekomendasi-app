@extends('layouts.landingpage')

@section('content')
    <div style="height: 90px;" class="p"></div>
    <div class="container my-5 p-4">
        <h2 class="fw-bold mb-4">Jadwal Imunisasi</h2>

        <div class="card shadow border-0">
            <div class="card-body">

                <table class="table" id="dataTables">
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
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
