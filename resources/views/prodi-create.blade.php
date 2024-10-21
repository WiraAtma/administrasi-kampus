@extends('layouts.mainLayouts')

@section('title','Tambah Program Studi')

@section('content')
    <div class="mt-5 col-8 m-auto">
    <div class="mt-5">
        <h4>Tambah Program Studi Kampus</h4>
    </div>
    @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/filter-prodi" method="post">
            @csrf
            <div class="mt-3">
                <label for="prodi">Nama Program Studi</label>
                <input type="text" name="name" id="prodi" class="form-control" minlength="3" required placeholder="Minimal 3 Karakter">
            </div>
            <div class="mt-3">
                <label for="fakultas">Fakultas Kampus</label>
                <select name="fakultas_id" id="fakultas" class="form-control" required>
                    <option value="">Pilih Fakultas <i></i></option>
                    @foreach ($fakultas as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                <small><i>Fakultas Bersifat Fixed Hubungi Pemilik Server Untuk Menambah</i></small>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
@endsection