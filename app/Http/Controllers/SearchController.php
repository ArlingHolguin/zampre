<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {

        $name = $request->name;

        $searchTerm = str_replace(' ', '', $name);

            $products = Product::where(function ($query) use ($searchTerm) {
                                $query->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $searchTerm . '%'])
                                      ->orWhereHas('subcategory.category', function ($subQuery) use ($searchTerm) {
                                          $subQuery->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $searchTerm . '%']);
                                      });
                            })
                            ->where('status', 2)
                            ->paginate(12);
            $products = $products->appends(['name' => $name]);

        return view('search', compact('products', 'name'));
    }
}
