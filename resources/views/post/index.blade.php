@extends('layouts.app')

@push('info')
    <h3 class="text-center my-4">Menu {{ $title ?? 'THIS IS A NEW PAGE' }}</h3>
    <p class="text-center my-4">{{ $name ?? 'My Credit' }}</p>
    <hr>
@endpush

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-outline-success mb-3">Tambah Post</a>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Foto</th>
                <th scope="col">Judul</th>
                <th scope="col">Konten</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <th scope="row">1</th>
                    <td><img src="{{ asset('/storage/post/' . $post->image) }}" alt="foto" width="100px"></td>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->konten }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Ingin menghapus data ini?');"
                            action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            <a href="" class="btn btn-outline-primary">Edit</a>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">Lihat</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger" role="alert">
                    Data Belum Tersedia!
                </div>
            @endforelse
        </tbody>
    </table>
@endsection
