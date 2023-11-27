<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Whoops\Run;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('categorie.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $category=new Category();
        $isupdate=false;
        return view('categorie.form',compact('category','isupdate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|min:5',
        // Add any other validation rules for other fields if needed
    ]);

    Category::create($data);

    return redirect()->route('categories.index')->with('success', 'Category Created With Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products=$category->products()->get();
      return view('categorie.show',compact('category','products'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $isupdate=true;
        return view('categorie.form',compact('category','isupdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'min:5',
                Rule::unique('categories')->ignore($category->id), // Ignore the current category when checking for uniqueness
            ],
            // Add any other validation rules for other fields if needed
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category Updated With Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category Deleted With Successfuly');

    }
}
