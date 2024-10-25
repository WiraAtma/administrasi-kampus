@extends('layouts.mainLayouts')

@section('title', 'Beranda')

@section('content')
<div class="container d-flex border">
    <div class="wrapper position-absolute top-50 start-50 translate-middle bg-center">
        <h1>Selamat Datang Di SISTEM INFORMASI KAMPUS</h1>
        <h2><i>Aplikasi Administrasi Kampus Berbasis Web</i></h2>
        <div class="mt-5">
        @if(auth()->check() && auth()->user()->name != '')
            <h6>User Login : {{ Auth::user()->name }}</h6>
            <h6>User Position : {{ Auth::user()->role->name }}</h6>
        @else
        @endif
    </div>
    </div>
    
</div>
    
@endsection
