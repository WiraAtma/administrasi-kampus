@extends('layouts.mainLayouts')

@section('title','Update Program Studi')

@section('content')
    <div class="mt-5 col-8 m-auto">
    <div class="mt-5">
        <h4>Edit Program Studi Kampus</h4>
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
        <form action="/filter-prodi/{{ $prodi->id }}" method="post">
            @csrf
            <div class="mt-3">
                <label for="prodi">Nama Program Studi</label>
                <input type="text" name="name" id="prodi" class="form-control" minlength="3" required placeholder="Minimal 3 Karakter" value="{{ $prodi->name }}">
            </div>
            <div class="mt-3">
                <label for="fakultas">Fakultas Kampus</label>
                <select name="fakultas_id" id="fakultas" class="form-control">
                <option value="{{ $prodi->fakultas_id }}">{{ $prodi->fakultas->name }}</option>
                    @foreach ($fakultas as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <small><i>Fakultas Bersifat Fixed Hubungi Pemilik Server Untuk Menambah</i></small>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection