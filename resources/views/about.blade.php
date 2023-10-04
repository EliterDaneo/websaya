@extends('layouts.app')

@push('info')
    <h3 class="text-center my-4">Menu {{ $title ?? 'THIS IS A NEW PAGE' }}</h3>
    <p class="text-center my-4">{{ $name ?? 'My Credit' }}</p>
    <hr>
@endpush

@section('content')
    <div class="text-center">
        <img src="{{ asset('img/foto.jpg') }}" class="rounded" alt="Gambar">
        <p>Lorem ipsum dolor sit.</p>
    </div>
@endsection
