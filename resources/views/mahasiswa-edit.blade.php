@extends('layouts.mainLayouts')

@section('title','Update Mahasiswa')

@section('content')
    <div class="col-8 m-auto">
        <h4>Edit Mahasiswa</h4>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/filter-mahasiswa/{{ $mahasiswa->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mt-3">
                <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                <input type="number" class="form-control" name="nim" id="nim" placeholder="Maksimal 10 Karakter" maxlength="10" value="{{ $mahasiswa->nim }}" required>
            </div>
            <div class="mt-3">
                <label for="name">Nama Mahasiswa</label>
                <input type="text" name="name" id="name" placeholder="Minimum 3 Karakter" class="form-control" minlength="3" value="{{ $mahasiswa->name }}" required>
            </div>
            <div class="mt-3">
                <label for="prodi">Program Studi</label>
                <select name="prodi_id" id="prodi" class="form-control" required>
                    <option value="{{ $mahasiswa->prodi_id }}">{{ $mahasiswa->prodi->name }}</option>
                    @foreach ($prodi as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="L" {{ $mahasiswa->gender == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ $mahasiswa->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="phone">Nomor Telepon Aktif</label>
                <input type="text" name="phone" id="phone" maxlength="20" placeholder="Maksimal 20 Karakter" class="form-control" value="{{ $mahasiswa->phone }}" required>
            </div>
            <div class="mt-3">
                <label for="email">Email Aktif</label>
                <input type="email" name="email" id="email" placeholder="Minimal 10 Karakter" minlength="10" class="form-control"  value="{{ $mahasiswa->email }}" required>
            </div>
            <div class="mt-3">
                <label for="formFileMultiple" class="form-label">Foto Siswa</label>
                <input class="form-control" name="photo" type="file" id="formFileMultiple" multiple>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection