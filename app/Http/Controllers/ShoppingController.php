<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class ShoppingController extends Controller
{
    public function index() 
    {
        //PCart::destroy();
        return view('shopping.index');
    }

    public function add_to_cart() {
        $result = '';
        $cnt = abs((int)request('cnt'));
        $id = abs((int)request('id'));

        $product = Product::find($id);

        if ($cnt && $product) {
            $cartItem = Cart::add([
                'id'    => $product->id,
                'name'  => $product->name,
                'qty'   => $cnt,
                'price' => $product->price,
            ]);

            Cart::associate($cartItem->rowId, Product::class);

            $result = 'success';
        } else {
            $result = 'error';
        }

        return response()->json(['result' => $result]);
    }
}
