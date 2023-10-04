@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">Kembali</a> <br>
    <div>
        <img src="{{ asset('storage/post/' . $post->image) }}" alt="foto" class="w-100 rounded">
        <p><strong>{{ $post->judul }}</strong></p>
        <p>{!! $post->konten !!}</p>

    </div>
@endsection
