<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Shetabit\Visitor\Traits\Visitor;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;


class WelcomeController extends Controller
{
    public function __invoke()
    {
        $currenrUrl = url()->current();
        SEOTools::setTitle('Zampre Online | Tienda');
        SEOTools::setDescription('Beisboleras para mujer y hombre, envios a todo el país, paga seguro en la puerta de su casa o recibe en oficina de la agencia de envios.');
       
        SEOMeta::addKeyword(['chaqueta beisbolera para mujer, chaqueta beisbolera para hombre, beisbolera']);
        SEOTools::opengraph()->setUrl($currenrUrl);
        SEOTools::setCanonical($currenrUrl);
        SEOTools::opengraph()->addProperty('type', 'page');
        SEOTools::twitter()->setSite('@zampreonline');
        SEOTools::jsonLd()->addImage(asset('asset/img/favicon.png'));
        SEOTools::addImages(asset('asset/img/favicon.png'));
        SEOMeta::setRobots('index, follow');

        OpenGraph::addProperty('locale', 'es_CO');

        OpenGraph::setTitle('Zampre Online | Tienda')
             ->setDescription('Beisboleras para mujer y hombre, envios a todo el país, paga seguro en la puerta de su casa o recibe en oficina de la agencia de envios.')
            ->setType('place')
            ->setPlace([
                'location:latitude' => '4.697745',
                'location:longitude' => '-74.0442047,20.75',
            ]);
            
        visitor()->visit();       

        $categories = Category::all();
        return view('welcome', compact('categories'));
        
    }
}
