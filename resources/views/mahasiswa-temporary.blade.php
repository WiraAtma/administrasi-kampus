@extends('layouts.mainLayouts')

@section('title','Daftar Temporary Mahasiswa')

@section('content')
<table class="table">
    <h1>Temporary Data Mahasiswa</h1>
    <thead>
        <tr>
            <th>#</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Program Studi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nim }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->prodi->name }}</td>
                <td><a href="/filter-restore-mahasiswa/{{ $data->id }}" class="btn btn-success">Pulihkan</a></td>
            </tr>
        @endforeach
    </tbody>
@endsection