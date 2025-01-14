@extends('layouts.mainLayouts')

@section('title', 'Beranda')

@section('content')
@if(auth()->check() && auth()->user()->role_id != '')
@else
    <div class="container d-flex">
        <div class="wrapper position-absolute top-50 start-50 translate-middle text-center">
            <h1>Selamat Datang di, </h1>
            <h1>SISTEM INFORMASI KAMPUS</h1>
            <h2><i>Aplikasi Administrasi Kampus Berbasis Web</i></h2>
            <a class="btn btn-primary my-3 py-3 px-5 bold" style="font-weight: bold" href="/login">AYO MULAI!</a>
        </div>
    </div>
@endif
@endsection
