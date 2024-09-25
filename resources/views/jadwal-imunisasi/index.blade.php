@extends('layouts.landingpage')

@section('content')
    <div style="height: 90px;" class="p"></div>
    <div class="container my-5 p-4">
        <h2 class="fw-bold mb-4">Jadwal</h2>

        <div class="card shadow border-0">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imunisasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_imunisasi }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_imunisasi)->locale('id')->isoFormat('D MMMM YYYY') }}</td>
                                <td>{{ $item->tempat_imunisasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
