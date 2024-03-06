<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Shetabit\Visitor\Traits\Visitor;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        visitor()->visit();


        return view('categorias.show', compact('category'));   


    }
    
}
