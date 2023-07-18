@extends('layouts.dashboard')

<!-- resources/views/members/form.blade.php -->
<form action="{{ isset($member) ? route('members.update', $member->id) : route('members.store') }}" method="POST">
    @csrf
    @if (isset($member))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="no">No:</label>
        <input type="text" name="no" id="no" class="form-control" value="{{ old('no', isset($member) ? $member->no : '') }}" required>
    </div>

    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', isset($member) ? $member->nama : '') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', isset($member) ? $member->email : '') }}" required>
    </div>

    <div class="form-group">
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" class="form-control" value="{{ old('role', isset($member) ? $member->role : '') }}" required>
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
            <option value="Laki-laki" {{ old('jenis_kelamin', isset($member) ? $member->jenis_kelamin : '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', isset($member) ? $member->jenis_kelamin : '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ isset($member) ? 'Update' : 'Create' }}</button>
    </div>
</form>

<!-- resources/views/members/index.blade.php -->
<h1>Daftar Member</h1>

<a href="{{ route('members.create') }}" class="btn btn-primary">Tambah Member</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->no }}</td>
                <td>{{ $member->nama }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->role }}</td>
                <td>{{ $member->jenis_kelamin }}</td>
                <td>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                        <a href="{{ route('members.show', $member->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- resources/views/members/show.blade.php -->
<h1>Detail Member</h1>

<p><strong>No:</strong> {{ $member->no }}</p>
<p><strong>Nama:</strong> {{ $member->nama }}</p>
<p><strong>Email:</strong> {{ $member->email }}</p>
<p><strong>Role:</strong> {{ $member->role }}</p>
<p><strong>Jenis Kelamin:</strong> {{ $member->jenis_kelamin }}</p>
<p><a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary">Edit</a></p>
