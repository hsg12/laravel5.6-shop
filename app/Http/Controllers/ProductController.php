<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $productCntInCart = 0;
        $total = 0;

        foreach(Cart::content() as $item){
            if ($product->id === $item->id) {
                $productCntInCart = $item->qty;
                $total = $product->price * $productCntInCart;
            }
        }

        return view('product.show', compact('product', 'productCntInCart', 'total'));
    }
}
