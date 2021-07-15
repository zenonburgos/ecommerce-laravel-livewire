<?php

use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;

// Averiguar stock de productos
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

// Cantidad en el carrito
function qty_added($product_id, $color_id = null, $size_id = null){

    $cart = Cart::content();

    $item = $cart->where('id', $product_id)
                 ->where('options.color_id', $color_id)
                 ->where('options.size_id', $size_id)
                 ->first();

    if($item){
        return $item->qty;        
    }else{
        return 0;
    }
}

function qty_available($product_id, $color_id = null, $size_id = null){
    return quantity($product_id, $color_id, $size_id) - qty_added($product_id, $color_id, $size_id);
}

function disccount($item){
    $product = Product::find($item->id);
    $qty_available = qty_available($item->id, $item->options->color_id, $item->options->size_id);

    if ($item->options->size_id) {
      
        $size = Size::find($item->options->size_id);

        $size->colors()->detach($item->options->color_id); //Borra la relación que existe entre talla y color

        $size->colors()->attach([
            $item->options->color_id => ['quantity' => $qty_available] //vuelve a agregar la relación con la cantidad actualizada
        ]);

    }elseif($item->options->color_id){
       
        $product->colors()->detach($item->options->color_id); //Borra la relación que existe entre producto y color

        $product->colors()->attach([
            $item->options->color_id => ['quantity' => $qty_available] //vuelve a agregar la relación con la cantidad actualizada
        ]);

    }else{

        $product->quantity = $qty_available;
        $product->save();

    }
}

function increase($item){

    $product = Product::find($item->id);

    $quantity = quantity($item->id, $item->options->color_id, $item->options->size_id) + $item->qty;

    if ($item->options->size_id) {
      
        $size = Size::find($item->options->size_id);

        $size->colors()->detach($item->options->color_id); //Borra la relación que existe entre talla y color

        $size->colors()->attach([
            $item->options->color_id => ['quantity' => $quantity] //vuelve a agregar la relación con la cantidad actualizada
        ]);

    }elseif($item->options->color_id){
       
        $product->colors()->detach($item->options->color_id); //Borra la relación que existe entre producto y color

        $product->colors()->attach([
            $item->options->color_id => ['quantity' => $quantity] //vuelve a agregar la relación con la cantidad actualizada
        ]);

    }else{

        $product->quantity = $quantity;
        $product->save();

    }
}