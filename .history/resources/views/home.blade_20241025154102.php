@extends('layouts.mainLayouts')

@section('title', 'Beranda')

@section('content')
@if(auth()->check() && auth()->user()->role_id != '')
@else
@endif
@endsection
