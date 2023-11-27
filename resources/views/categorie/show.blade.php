@extends('layouts.base')

@section('title', 'Categories')
@section('navbar', $category->name)
@section('content')
<div class="d-flex justify-content-between align-items-center" >


    <a href="{{ route('categories.index') }}" class="btn btn-success">Go Back</a>
</div>



    <table class="table table-striped">
        <thead>
            <tr>
                <th >#ID</th>
                <th >Name</th>
                <th >Update Product</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($products) && count($products) > 0)
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td> <!-- Assuming $categorie has an 'id' property -->
                        <td>{{ $product->name }}</td>
                       <td>
                            <div class="btn-group gap-2">
                                <a href="{{ route('products.edit',$product) }}" class="btn btn-success btn-sm ms-2" >
                                    <i class="bi bi-pen" style="width: 50%"></i></a>



                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" align="center"><h2>No Products For This Categorie</h2></td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
