<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::query()->with('category')->paginate(perPage:10);

        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product=new product();
        $categories=Category::all();
        $isupdate=false;
        return view('product.form',compact('product','isupdate','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formfields=$request->validated();
        $formfields['image']=$this->uploadImage($request);

        product::create($formfields);
        return to_route(route:'products.index')->with('success','Product create Successfuly');

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
        $categories = Category::all();
        return view('product.form',compact('product','isupdate','categories'));
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
            'name' => $request->input('name'),
            'category_id'=>$request->input('category_id'),
        ];

        // Only update 'image' if a new file is provided
        if ($imagePath !== null) {
            $data['image'] = $imagePath;
        }

        // Update the product attributes
        $product->update($data);

        // Update the category name if provided


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
    public function productscount()
    {
 $productscount=product::count();
 $maxproducts=product::max('price');
 $minproducts=product::min('price');
 $sumproducts=product::sum('price');
return view('Users.admin.dashboard',compact('productscount','maxproducts','minproducts','sumproducts'));



    }
    public function categorycount(){
        $Categorycount=Category::count();
    }

}
