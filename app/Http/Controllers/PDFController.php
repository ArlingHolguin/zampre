<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //
    public function pdf(){
        $pdf = PDF::loadView('prueba');
        return $pdf->stream('prueba.pdf');
    }

    public function pdfPedido(){
        $products = Product::all();
        $pdf = PDF::loadView('pedido', compact('products'));
        return $pdf->download('pedido.pdf');
    }
}

