
@php
$route=route('categories.store');
if($isupdate){
    $route=route('categories.update',$category);
}

@endphp

@extends('layouts.base')
@section('navbar','Update Category')
@section('title',($isupdate?'Update':'Create'). ' Categorie')

@section('content')

    <form action="{{ $route }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @if($isupdate)
        @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$category->name) }}">
        </div>

        <div class="form-group">

            <input type="submit" style="background-color: blue" class="btn btn-primary  d-grid gap-2 col-6 mx-auto mt-2"    value="{{ $isupdate?'Edit':'Create' }}">
        </div>
    </form>


@endsection




