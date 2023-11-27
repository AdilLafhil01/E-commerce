@extends('layouts.base')

@section('title', 'Edit Products')

@section('content')
    <h1 align="center">@yield('title') </h1>
    @include('product.form')

@endsection
