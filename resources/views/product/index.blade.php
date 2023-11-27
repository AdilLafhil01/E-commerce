
@extends('layouts.base')
@section('title', 'Products')
@section('navbar',' List Product')

@section('content')
<div class="d-flex justify-content-end" >


    <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
</div>



    <table class="table table-striped">
        <thead>
            <tr>
                <th >#ID</th>
                <th >Name</th>
                <th >Description</th>
                <th >Categorie</th>
                <th >Quantity</th>
                <th >Images</th>
                <th >Price</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($products) && count($products) > 0)
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td> <!-- Assuming $product has an 'id' property -->
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td align="centre">

                                @if ( $product->category)
                                <span class="badge bg-info">
                                <a href="{{ route('categories.show',$product->category_id) }}" class="btn btn-link-white">{{ $product->category->name }}



                                </a>
                            </span>
                                @endif


                    </td>

                        <td>{{ $product->quantity }}</td>
                        <td><img width="100px" src="storage/{{ $product ->image }}" alt=""></td>
                        <td>{{ $product->price }} MAD</td>
                        <td>
                            <div class="btn-group gap-2">
                                <a href="{{ route('products.edit',$product) }}" class="btn btn-success btn-sm ms-2" style="width: 10%">
                                    <i class="bi bi-pen"></i></a>
                                <form action="{{ route('products.destroy',$product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" value="" class="btn btn-danger btn-sm ms-2" style="background-color: red ">
                                  <i class="bi bi-trash"></i> </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" align="center"><h2>No Products</h2></td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
