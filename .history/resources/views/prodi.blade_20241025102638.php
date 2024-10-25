@extends('layouts.mainLayouts')

@section('title','Program Studi')

@section('content')
    <h1>Daftar Program Studi</h1>
    @if (session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="my-5 d-flex justify-content-between">
        <a href="/prodi-create" class="btn btn-primary">Create</a>
        <a href="/prodi-temporary" class="btn btn-info">Temporary Data</a>
    </div>
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
                        <td>
                            <a href="/prodi-detail/{{ $data->id }}" class="btn btn-primary">Detail</a>
                            <a href="/prodi-edit/{{ $data->id }}" class="btn btn-success">Update</a>
                            @if(auth()->check() && auth()->user()->role_id == '1')
                            <a href="/prodi-delete/{{ $data->id }}" class="btn btn-danger">Delete</a>
                            @else
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
