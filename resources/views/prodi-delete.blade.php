@extends('layouts.mainLayouts')

@section('title','Hapus Program Studi')

@section('content')
    <h3>Anda Yakin Mau Menghapus Prodi : {{ $prodi->name }}</h3>
    <form action="/filter-delete-prodi/{{ $prodi->id }}" method="post" style="display: inline-block" class="mt-3">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Hapus</button>
    </form>
    <a href="/prodi" class="btn btn-primary">Batal</a>
@endsection