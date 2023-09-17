@extends('layouts.dashboard')

@section('content')
@if(Session::has('success'))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
dzgndnd
@endsection