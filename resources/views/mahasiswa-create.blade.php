@extends('layouts.mainLayouts')

@section('title','Tambah Mahasiswa')

@section('content')
    <div class="col-8 m-auto">
        <h4>Menambah Mahasiswa</h4>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="filter-mahasiswa" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                <input type="text" inputmode="numeric" class="form-control" name="nim" id="nim" placeholder="Maksimal 10 Karakter" maxlength="10" required>
            </div>
            <div class="mt-3">
                <label for="name">Nama Mahasiswa</label>
                <input type="text" name="name" id="name" placeholder="Minimum 3 Karakter" class="form-control" minlength="3" required>
            </div>
            <div class="mt-3">
                <label for="prodi">Program Studi</label>
                <select name="prodi_id" id="prodi" class="form-control" required>
                    <option value="">Pilih Program Studi</option>
                    @foreach ($prodi as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Pilih Gender</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="phone">Nomor Telepon Aktif</label>
                <input type="text" inputmode="numeric" name="phone" id="phone" maxlength="20" placeholder="Maksimal 20 Karakter" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="email">Email Aktif</label>
                <input type="email" name="email" id="email" placeholder="Minimal 10 Karakter" minlength="10" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="formFileMultiple" class="form-label">Foto Siswa</label>
                <input class="form-control" name="photo" type="file" id="formFileMultiple" multiple>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
    
@endsection