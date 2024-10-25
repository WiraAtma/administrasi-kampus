@extends('layouts.mainLayouts')

@section('title', 'Beranda')

@section('content')
    <h1>Selamat Datang Di SISTEM INFORMASI KAMPUS</h1>
    <h2><i>Aplikasi Administrasi Kampus Berbasis Web</i></h2>
    <h3 style="color: red">Web On Developent !</h3>
    <div class="mt-5">
        @if(auth()->check() && auth()->user()->name != '')
            <h6>User Login : {{ Auth::user()->name }}</h6>
            <h6>User Position : {{ Auth::user()->role->name }}</h6>
        @else
        @endif
    </div>
@endsection

    