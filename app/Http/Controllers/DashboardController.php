<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
            'searchType' => 'required|in:product,category',
        ]);

        $query = $request->input('search');
        $searchType = $request->input('searchType');

        if ($searchType === 'product') {
            $products = Product::where('name', 'like', '%' . $query . '%')
                ->orWhere('price', 'like', '%' . $query . '%')
                ->orWhere('id', 'like', '%' . $query . '%')
                ->orWhere('quantity', 'like', '%' . $query . '%')
                ->get();

            return view('product.index', compact('products'));
        } elseif ($searchType === 'category') {
            $categories = Category::where('name', 'like', '%' . $query . '%')

                ->get();

            return view('categorie.index', compact('categories'));
        }
    }


    public function searchCategory(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255', // Assurez-vous d'ajuster les règles de validation en fonction de vos besoins.
        ]);

        $query = $request->input('search');
$categories=Category::where('name','like','%'.$query.'%')

        ->orWhere('id', 'like', '%' . $query . '%')
        ->get();

    // Ajoutez cette ligne pour imprimer la requête SQL


        // Vous pouvez également utiliser la pagination ici si nécessaire
        // $products = Product::paginate(10);

        return view('categorie.index', compact('categories'));
    }

    public function countEtudiant(){
        $productcount = product::count();
        $productmax = product::max('price');
        $productsomme = product::sum('price');
        $productmin = product::min('price');
        $categorycount=Category::count();
        $Categorymax=Category::max('name');
        $Categorysum=Category::sum('name');

    return view('users.admin.dashboard', compact('productcount','productmax','productsomme','productmin','categorycount'));




    }
    public function searchProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Assurez-vous d'ajuster les règles de validation en fonction de vos besoins.
        ]);

        $query = $request->input('name');
$products=product::where('name','like','%'.$query.'%')

        ->orWhere('description', 'like', '%' . $query . '%')
        ->get();


        return to_route('store.index', compact('products'));
    }





}
