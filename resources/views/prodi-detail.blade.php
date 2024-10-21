@extends('layouts.mainLayouts')

@section('title','Detail Program Studi')

@section('content')
    <h1>Detail Program Studi</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Fakultas</th>
                <th>Program Studi</th>
                <th>Mahasiswa</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $prodi->fakultas->name }}</td>
                <td>{{ $prodi->name }}</td>
                <td>
                    <ol>
                        @foreach ($prodi->mahasiswa as $mahasiswa)
                        <li> {{ $mahasiswa->name }}</li>
                        @endforeach
                    </ol>                   
                </td>
            </tr>
        </tbody>
    </table>
@endsection