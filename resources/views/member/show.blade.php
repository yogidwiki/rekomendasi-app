<!-- resources/views/members/show.blade.php -->
<h1>Detail Member</h1>

<p><strong>No:</strong> {{ $member->no }}</p>
<p><strong>Nama:</strong> {{ $member->nama }}</p>
<p><strong>Email:</strong> {{ $member->email }}</p>
<p><strong>Role:</strong> {{ $member->role }}</p>
<p><strong>Jenis Kelamin:</strong> {{ $member->jenis_kelamin }}</p>

<a href="{{ route('members.edit', $member->id) }}">Edit</a>
