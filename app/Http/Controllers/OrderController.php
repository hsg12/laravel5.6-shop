<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $ordersData = [];

        if (auth()->user()) {
            $currentUserId = auth()->user()->id;

            $orders = Order::where('user_id', $currentUserId)->get();
            
            foreach ($orders as $key => $order) {
                $ordersArray = json_decode($order->products, true);
                $ids = array_keys($ordersArray);
                $productsInOrder = Product::whereIn('id', $ids)->get();

                $ordersData[$key]['order'] = $order;
                $ordersData[$key]['products'] = $productsInOrder;
            }
        }
        
        return view('orders.index', compact('ordersData'));
    }
}
