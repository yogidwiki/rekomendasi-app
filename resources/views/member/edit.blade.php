<!-- resources/views/members/edit.blade.php -->
<h1>Edit Member</h1>

<form action="{{ route('members.update', $member->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="no">No:</label>
        <input type="text" name="no" id="no" value="{{ old('no', $member->no) }}" required>
    </div>

    <div>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $member->nama) }}" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" required>
    </div>

    <div>
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" value="{{ old('role', $member->role) }}" required>
    </div>

    <div>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="Laki-laki" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <button type="submit">Simpan</button>
</form>
