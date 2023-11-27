
@php
$route=route('products.store');
if($isupdate){
    $route=route('products.update',$product);
}

@endphp

@extends('layouts.base')

@section('title',($isupdate?'Update':'Create'). ' Product')

@section('content')
    <h1 align="center">@yield('title') </h1>
    <form action="{{ $route }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @if($isupdate)
        @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$product->name) }}">
        </div>
        <div class="form-group">
            <label for="description">Description </label>
            <textarea  name="description" id="description" class="form-control">{{ old('description',$product->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity </label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity',$product->quantity) }}">
        </div>
        <div class="form-group">
            <label for="image">Images </label>
            <input type="file" name="image" id="image" class="form-control" >

            @if($product->image)
                <img width="100px" src="{{ asset('storage/'.$product->image) }}" alt="Product Image">
            @endif
        </div>

        <div class="form-group">
            <label for="price">Price </label>
            <input type="number" step="0.5" name="price" id="price" class="form-control" value="{{ old('price',$product->price) }}">
        </div>
        <div class="form-group">

            <input type="submit" style="background-color: blue" class="btn btn-primary  d-grid gap-2 col-6 mx-auto mt-2"    value="{{ $isupdate?'Edit':'Create' }}">
        </div>
    </form>


@endsection




