@extends('layouts.mainLayouts')

@section('title','Daftar Mahasiswa')

@section('content')
    <h1>Daftar Mahasiswa Kampus</h1>
    @if (session()->has('status'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="my-4 d-flex justify-content-between">
        <a href="/mahasiswa-create" class="btn btn-primary">Create</a>
        <a href="/mahasiswa-temporary" class="btn btn-info">Temporary Data</a>
    </div>
    <div class="my-3 col-12 col-sm-8 col-md-4">
        <form action="" method="get">
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="keyword" placeholder="Cari Nama, NIM, Prodi">
              <button class="input-group-text btn btn-primary">Cari</button>
          </div>
        </form>
    </div>
    <table class="table">
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
            @foreach ($mahasiswaList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nim }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->prodi->name }}</td>
                    <td>
                        <a href="/mahasiswa-detail/{{ $data->id }}" class="btn btn-primary">Detail</a>
                        <a href="/mahasiswa-edit/{{ $data->id }}" class="btn btn-success">Update</a>
                        @if(auth()->check() && auth())
                        <a href="/mahasiswa-delete/{{ $data->id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{ $mahasiswaList->withQueryString()->links() }}
    </div>
@endsection