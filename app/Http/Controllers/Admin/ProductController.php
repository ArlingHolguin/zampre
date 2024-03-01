<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class ProductController extends Controller
{
    //
    public function files(Product $product, Request $request)
    {
        $url =  Storage::put('products', $request->file('file'));
        $product->images()->create([
            'url' => $url
        ]);
    }
}
