@extends('layouts.mainLayouts')

@section('title','Detail Mahasiswa')

@section('content')
    <h1>Data Detail Mahasiswa</h1>
    <div class="my-3">
        @if ($mahasiswa->image != '')
            <img src="{{ asset('storage/photo/'. $mahasiswa->image) }}" alt="image" style="width:200px">
        @else
            <img src="{{ asset('storage/default/defaultPhoto.jpg') }}" alt="image-default" style="width:200px">
        @endif
        
    </div>
    <div class="mt-5">
        <table class="table" style="width: 50%">
            <tr>
                <th>NIM</th>
                <td>{{ $mahasiswa->nim }}</td>
            </tr>
            <tr>
                <th>Nama Mahasiswa</th>
                <td>{{ $mahasiswa->name }}</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>{{ $mahasiswa->prodi->name }}</td>
            </tr>
            <tr>
                <th>Fakultas</th>
                <td>{{ $mahasiswa->prodi->fakultas->name }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                    @if ($mahasiswa->gender === 'L')
                        Laki - Laki
                    @else
                        Perempuan
                    @endif 
                </td>
            </tr>
            <tr>
                <th>Telepon (Aktif)</th>
                <td>{{ $mahasiswa->phone }}</td>
            </tr>
            <tr>
                <th>Alamat Email</th>
                <td>{{ $mahasiswa->email }}</td>
            </tr>
        </table>
    </div>
@endsection