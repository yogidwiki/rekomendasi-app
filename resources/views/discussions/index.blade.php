@extends('layouts.dashboard')

@section('content')
@if(Session::has('success'))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<h4 class="fw-bold py-3 mb-4">Tabel discussions</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Content</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($discussions as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>
                                        {{ $item->user->name }}
                                    </td>
                                    <td>
                                        {{ $item->content }}
                                    </td>
                                    <td>
                                        {{ $item->category->name }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($item->birthday)->formatLocalized('%d %B %Y') }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form method="POST" action="{{ route('discussions.destroy', $item->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete-button btn-sm"
                                                    data-name="{{ $item->name }}"
                                                    data-id="{{ $item->id }}">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection