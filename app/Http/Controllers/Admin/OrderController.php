<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    protected $status = ['Accepted', 'In Progress', 'Late', 'Delivered', 'Canceled'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $cnt = 0;

        return view('admin.orders.index', compact('orders', 'cnt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $ordersArray = json_decode($order->products, true);
        $ids = array_keys($ordersArray);
        $status = $this->status;

        $products = Product::whereIn('id', $ids)->get();
        return view('admin.orders.show', compact('order', 'products', 'ordersArray', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $this->validate(request(), [
            'status' => 'required|in:' . implode(',' , $this->status),
        ]);

        $order->status = request('status');
        $order->update();

        session()->flash('success', 'Order status updated!');
        return redirect()->route('orders.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function history()
    {
        $orders = Order::onlyTrashed()->get();
        $cnt = 0;

        return view('admin.orders.history', compact('orders', 'cnt'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        session()->flash('success', 'Order deleted!');
        return back();
    }

    public function delete_permanently($id)
    {
        $order = Order::onlyTrashed()->where('id', $id)->first();
        $order->forceDelete();

        session()->flash('success', 'Order permanently deleted!');
        return back();
    }
}
