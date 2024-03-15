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
    $qty_available = qty_available($item->id, $item->options->color_id, $item->options->size_id);

    if($item->options->size_id){
        $size = Size::find($item->options->size_id);
        $size->colors()->detach($item->options->color_id);
        $size->colors()->attach($item->options->color_id, ['quantity' => $qty_available]);

    }elseif($item->options->color_id){

        $product->colors()->detach($item->options->color_id);
        $product->colors()->attach($item->options->color_id, ['quantity' => $qty_available]);

    }else{        
        
        // $qty_available = qty_available($item->id);    
        $product->quantity = $qty_available;

        $product->save();
    }
}
    

function increase($item)
{

    $product = Product::find($item->id);

    $quantity = quantity($item->id) + $item->qty;
    $product->quantity = $quantity;
    $product->save();
}

function getClientInfo()
{
    try {
        $data = file_get_contents("https://www.cloudflare.com/cdn-cgi/trace");
        $ipRegex = '/ip=([0-9.]+)/';
        $locRegex = '/loc=([A-Z]+)/';
        $uagRegex = '/uag=(.+)/';
        $tsRegex = '/ts=([0-9.]+)/';

        $ip = preg_match($ipRegex, $data, $matchesIp) ? $matchesIp[1] : "IP no encontrada";
        $loc = preg_match($locRegex, $data, $matchesLoc) ? $matchesLoc[1] : "Ubicación no encontrada";
        $uag = preg_match($uagRegex, $data, $matchesUag) ? $matchesUag[1] : "User-Agent no encontrado";
        $ts = preg_match($tsRegex, $data, $matchesTs) ? $matchesTs[1] : "Marca de tiempo no encontrada";

        // Convertir la marca de tiempo a una fecha y hora legible
        $fechaHora = date("Y-m-d H:i:s", (int)$ts);

        return [
            'ip' => $ip,
            'loc' => $loc,
            'uag' => $uag,
            'ts' => $fechaHora // Fecha y hora legible
        ];
    } catch (\Exception $e) {
        return [
            'ip' => "Error al obtener la IP",
            'loc' => "Error al obtener la ubicación",
            'uag' => "Error al obtener el User-Agent",
            'ts' => "Error al obtener la marca de tiempo"
        ];
    }
}






    
  


