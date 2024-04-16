<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show(Product $product){
        $currenrUrl = url()->current();
        $firstImage = $product->images->first();  // Intenta obtener el primer elemento de la colección
        $firstImageUrl = $firstImage ? Storage::url($firstImage->url) : 'https://via.placeholder.com/150';

        
        $keywordsJson = $product->keywords;
        $keywordsJson = trim($keywordsJson, "\"");
        $keywordsArray = json_decode($keywordsJson, true);
        $keywordsString = implode(", ", $keywordsArray);

        SEOTools::setTitle($product->name . '| Zampre Online | Tienda');
        SEOTools::setDescription($product->extracto);
        // dd($formattedKeywords);
        SEOMeta::addKeyword([$keywordsString]);
        SEOTools::opengraph()->setUrl($currenrUrl);
        SEOTools::setCanonical($currenrUrl);
        SEOTools::opengraph()->addProperty('type', 'page');
        SEOTools::twitter()->setSite('@zampreonline');
        SEOTools::jsonLd()->addImage($firstImageUrl);
        SEOTools::addImages($firstImageUrl);
        SEOMeta::setRobots('index, follow');

        OpenGraph::addProperty('locale', 'es_CO');

        OpenGraph::setTitle($product->name . '| Zampre Online | Tienda')
             ->setDescription($product->extracto)
            ->setType('place')
            ->setPlace([
                'location:latitude' => '4.697745',
                'location:longitude' => '-74.0442047,20.75',
            ]);

        return view('products.show', compact('product'));

    }
}
