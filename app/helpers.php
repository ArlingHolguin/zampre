<?php

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;

function quantity($product_id, $color_id = null, $size_id = null){

    $product = Product::find($product_id);
    
    if($size_id){
        $size = Size::find($size_id);
        $quantity = $size->colors->find($color_id)->pivot->quantity;
        
    }elseif($color_id){
        $quantity = $product->colors->find($color_id)->pivot->quantity;
    }else{
        $quantity = $product->quantity;
    }
    

    return $quantity;
}

function qty_added($product_id, $color_id = null, $size_id = null) {
    
    $cart = Cart::content();
    $item = null;

    // dd($cart);
    if ($color_id && $size_id) {
        // Caso para productos con color y talla
        $item = $cart->where('id', $product_id)
                     ->where('options.color_id', $color_id)
                     ->where('options.size_id', $size_id)
                     ->first();
    } elseif ($color_id) {
        
        // Caso para productos solo con color
        $item = $cart->where('id', $product_id)
                     ->where('options.color_id', $color_id)
                     ->first();

                   
    } else {
        // Caso para productos sin color ni talla
        $item = $cart->where('id', $product_id)->first();                     
    }

    
    return $item ? $item->qty : 0;
}


function qty_available($product_id, $color_id = null, $size_id = null)
{
    
   
    // dump(quantity($product_id, $color_id, $size_id) - qty_added($product_id, $color_id, $size_id));
    return quantity($product_id, $color_id, $size_id) - qty_added($product_id, $color_id, $size_id);
}


function discount($item)
{
    $product = Product::find($item->id);
    $qty_available = qty_available($item->id);

    $product->quantity = $qty_available;
    $product->save();
}
    

function increase($item)
{

    $product = Product::find($item->id);

    $quantity = quantity($item->id) + $item->qty;
    $product->quantity = $quantity;
    $product->save();
}




    
  


