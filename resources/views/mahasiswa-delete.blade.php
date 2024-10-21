@extends('layouts.mainLayouts')

@section('title','Delete Mahasiswa')

@section('content')
    <h3>Anda Yakin Ingin Menghapus Mahasiswa : {{ $mahasiswa->name }} ({{ $mahasiswa->nim }})</h3>
    <div class="mt-3">
        <form action="/filter-delete-mahasiswa/{{ $mahasiswa->id }}" style="display: inline-block" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Hapus</button>
        </form>
        <a href="/mahasiswa" class="btn btn-primary">Batal</a>
    </div>
@endsection