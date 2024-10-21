@extends('layouts.mainLayouts')

@section('title','Daftar Temporary Prodi')

@section('content')
<table class="table">
    <h1>Temporary Data Program Studi</h1>
    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Program Studi</th>
                    <th>Fakultas Kampus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prodi as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->fakultas->name}}</td>
                        <td><a href="/filter-restore-prodi/{{ $data->id }}" class="btn btn-success">Pulihkan</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection