@extends('store.store')

@section('title', 'Products')

@section('content')


<style>
    .beautiful-color {
        color: #007BFF; /* Couleur bleue comme exemple, remplacez par la couleur de votre choix */
    }
</style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('products.index') }}"><h1 class="beautiful-color">Products</h1><center>
            </center></a>
            <button class="navbar-toggler beautiful-color" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon beautiful-color"></span>
            </button>

        </div>

    </nav>



<div class="container " >

    <div class="d-flex justify-content-between">

   <div>

            <h1>Filters</h1>
            <hr>
            <form method="GET">

                <div class="form-group ">
                    <label class="form-label " for="name">Name Or Description:</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ Request::input('name') }}" name="name" placeholder="Name" class="form-control">
                    </div>
                </div>

                <h3>Categories :</h3>
                @if (isset($categories))
    @foreach ($categories as $category)
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                value="{{ $category->id }}"
                name="categories[]"
                {{ in_array($category->id, $categoriesIds ?? []) ? 'checked' : '' }}
            >
            <label class="form-check-label">{{ $category->name }}</label>
        </div>
    @endforeach
@endif

<h3>Pricing :</h3>
<div class="form-group">
    <label for="min">Min :</label>
    <div class="col-sm-10">
        <input min="{{ $priceOptions->minPrice }}" max="{{ $priceOptions->maxPrice }}" type="number" value="{{ Request::input('min') }}"  name="min" placeholder="Min Price" class="form-control">
    </div>

        <label for="max">Max :</label>
    <div class="col-sm-10">
        <input min="{{ $priceOptions->minPrice }}" max="{{ $priceOptions->maxPrice }}"   type="number" value="{{ Request::input('max') }}" name="max" placeholder="Max Price" class="form-control">
    </div>
</div>





                <div class="form-group my-2">
                    <input type="submit" class="btn btn-primary " value="Filtrer" />
                  <a href="{{ route('home_page') }}" type="reset" class="btn btn-secondary"> Reset</a>

                </div>
                <hr>
            </form>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 ms-5">
            @if(isset($products) && count($products) > 0)
                @foreach($products as $product)
                    <div class="col " style="width: 300px">
                        <div class="card"  >
                            <img class="card-img-top h-100 "  src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                            <div class="card-body">
                                <h1 class="card-title">{{ $product->name }}</h1>
                                <p class="card-text"><strong>{!! $product->description !!}</strong></p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span>Quantity: <span class="badge bg-success">{{ $product->quantity }}</span></span>
                                    <span>Price: <span class="badge bg-primary">{{ $product->price }} MAD</span></span>
                                </div>
                                <div class="my-2">
                                    <span>Categorie: <span class="badge bg-primary">{{ $product->category ? $product->category->name : 'N/A' }}</span></span>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <small>{{ $product->created_at }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach


                @else


                    <div class="container mx-auto p-4 mt-5 " style="position: relative;">
                        <div class="d-flex align-items-center justify-content-center mx-auto p-4" style="width: 2000px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <center>
                            <div class="alert alert-info text-center mt-5  " role="alert" style="max-width: 2000px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <h3 class="fw-bold" style="color: #007bff; font-size: 24px;">No Product</h3>
                                <p class="mb-0" style="color: #555;">There are currently no products available.</p>
                            </div>
                        </center>
                        </div>
                    </div>













            @endif
        </div>

    </div>
</div>



@endsection
