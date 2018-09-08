<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class ShoppingController extends Controller
{
    public function index() 
    {
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

            /*
                If we first added 2 products to the cart, then we change the number to 3 and then add it again, 
                we will have 5 products in cart instead of 3. 
                To avoid this, we update our product information.
            */
            Cart::update($cartItem->rowId, $cnt);

            $productsCount = Cart::count();

            $result = ['result' => 'success', 'productCount' => $productsCount];
        } else {
            $result = ['result' => 'error'];
        }

        return response()->json($result);
    }

    public function delete_from_cart(Product $product) {
        if ($product) {
            foreach(Cart::content() as $item){
                if ($product->id === $item->id) {
                    Cart::remove($item->rowId);
                }
            }
        }
        return back();
    }
}
