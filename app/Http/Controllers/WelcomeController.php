<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Shetabit\Visitor\Traits\Visitor;


class WelcomeController extends Controller
{
    public function __invoke()
    {
        visitor()->visit();
        

        $categories = Category::all();
        return view('welcome', compact('categories'));
        
    }
}
