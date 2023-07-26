@extends('layouts.dashboard')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h4 class="fw-bold py-3 mb-4">Tabel testimonials</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($testimonials as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        {{ $item->ulasan }}
                                    </td>
                                    <td>
                                        @php
                                            $rating = $item->rating;
                                        @endphp
                                    
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                            <span class="me-2">⭐</span> 
                                            @else
                                            <span class="me-2"></span> 
                                            @endif
                                        @endfor
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form method="POST" action="{{ route('testimonials.destroy', $item->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger delete-button btn-sm"
                                                    data-name="{{ $item->ulasan }}"
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
