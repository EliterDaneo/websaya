@extends('layouts.app')

@push('info')
    <h3 class="text-center my-4">Menu {{ $title ?? 'THIS IS A NEW PAGE' }}</h3>
    <p class="text-center my-4">{{ $name ?? 'My Credit' }}</p>
    <hr>
@endpush

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Foto</label>
            <input type="file" name="image" class="form-control" id="file" aria-describedby="emailHelp">
            @error('image')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukan Judul"
                aria-describedby="judulHelp">
            @error('judul')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="konten" class="form-label">Konten</label><br>
            <textarea name="konten" class="form-control" placeholder="Masukan Konten" id="floatingTextarea2" style="height: 100px"></textarea>
            @error('konten')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
