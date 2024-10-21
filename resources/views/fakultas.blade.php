@extends('layouts.mainLayouts')

@section('title', 'Fakultas Kampus')

@section('content')
    <h1>Daftar Fakultas Kampus</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Fakultas Kampus</th>
                <th>Program Studi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fakultas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name}}</td>
                    <td>
                        @foreach ($data->prodi as $prodi)
                            - {{ $prodi->name }} <br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection