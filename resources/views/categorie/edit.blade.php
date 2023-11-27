@extends('layouts.base')

@section('title', 'Edit Categorie')

@section('content')
    <h1 align="center">@yield('title') </h1>
    @include('categorie.form')

@endsection
