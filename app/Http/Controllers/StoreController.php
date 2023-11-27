<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
use stdClass;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productquerry=product::query()->with('category');
        $categories=Category::with('products')->has('products')->get();
        $query = $request->input('name');

        $categoriesids=$request->input('categories');
        if(!empty($categoriesids))
        {
            $productquerry->whereIn('category_id',$categoriesids);



        }

        $max = $request->input('max');
        $min = $request->input('min');




$productquerry->when(!empty($min), function ($query) use ($min) {
    $query->where('price', '>=', $min);
});

$productquerry->when(!empty($max), function ($query) use ($max) {
    $query->where('price', '<=', $max);
});




        if(!empty($query))
        {
            $productquerry->where('name','like','%'.$query.'%')

        ->orWhere('description', 'like', '%' . $query . '%');


        }
        $products = $productquerry->get();
$price = $products->pluck('price')->all();

$priceOptions = new stdClass();

if (!empty($price)) {
    $priceOptions->minPrice = min($price);
    $priceOptions->maxPrice = max($price);
} else {
    // Gérer le cas où le tableau $price est vide (pas de résultats dans la requête)
    $priceOptions->minPrice = 0; // Remplacez par la valeur par défaut souhaitée
    $priceOptions->maxPrice = 0; // Remplacez par la valeur par défaut souhaitée
}




        return view('store.index', compact('products','categories','priceOptions'));




    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product=new product();
        $isupdate=false;
        return view('product.form',compact('product','isupdate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formfields=$request->validated();
        $formfields['image']=$this->uploadImage($request);

        product::create($formfields);
        return to_route(route:'products.index')->with('succes','Product create Successfuly');

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {


        $isupdate=true;
        return view('product.form',compact('product','isupdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
{
    $imagePath = $this->uploadImage($request);

    $data = [
        'description' => $request->input('description'),
        'quantity' => $request->input('quantity'),
        'price' => $request->input('price'),
    ];

    // Only update 'image' if a new file is provided
    if ($imagePath !== null) {
        $data['image'] = $imagePath;
    }

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
}

    private function uploadImage(ProductRequest $request)
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('product', 'public');
        }

        return null;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return to_route(route:'products.index')->with('succes','Product Deleted Successfuly');


    }
}
