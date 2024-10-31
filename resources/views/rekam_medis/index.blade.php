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
                    <th>Imunisasi</th>
                    <th>tanggal</th>
                    <th>Riwayat Penyakit</th>
                    <th>Alergi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekamMedis as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <a href="{{ route('users.show', $item->orangTua->user_id) }}" class="menu-link">
                                {{ $item->orangTua->nama_ibu }}
                            </a>
                        </td>


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
    </div>
</div>

@endsection
<style>
    .menu-link {
        color: black; /* Ubah warna teks */
        text-decoration: none; /* Hilangkan garis bawah */
    }
    .menu-link:hover {
        color: #007bff; /* Warna ketika di-hover */
        text-decoration: underline; /* Gaya ketika di-hover */
    }
</style>
