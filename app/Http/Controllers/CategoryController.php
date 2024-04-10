<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Shetabit\Visitor\Traits\Visitor;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        visitor()->visit();
        $currenrUrl = url()->current();

        SEOTools::setTitle($category->name . '| Zampre Online');
        SEOTools::setDescription($category->extracto);
        // dd($formattedKeywords);
        SEOMeta::addKeyword([$category->keywords]);
        SEOTools::opengraph()->setUrl($currenrUrl);
        SEOTools::setCanonical($currenrUrl);
        SEOTools::opengraph()->addProperty('type', 'page');
        SEOTools::twitter()->setSite('@zampreonline');
        SEOTools::jsonLd()->addImage($category->icon);
        SEOTools::addImages($category->icon);
        SEOMeta::setRobots('index, follow');

        OpenGraph::addProperty('locale', 'es_CO');

        OpenGraph::setTitle($category->name . '| Zampre Online')
             ->setDescription($category->extracto)
            ->setType('place')
            ->setPlace([
                'location:latitude' => '4.697745',
                'location:longitude' => '-74.0442047,20.75',
            ]);


        return view('categorias.show', compact('category'));   


    }
    
}
