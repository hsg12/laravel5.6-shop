@extends('layouts-admin.master')
@section('title', "| Orders")

@section('content')

<div class="px-5">

    <h4 class="mt-3 mb-4">Order ID {{ $order->id }}</h4>

    <div class="row">
        <div class="col-sm-6">
            <div class="mb-4">
                <h6 class="mb-3">Customer`s Data</h6>
                <div>Customer: <strong class="tag-strong">{{ $order->user->name }}</strong></div>
                <div>Email: <strong class="tag-strong">{{ $order->user->email }}</strong></div>
                <div>Address: <strong class="tag-strong">{{ $order->user->address }}</strong></div>
                @if($order->user->phone)
                <div>Phone: <strong class="tag-strong">{{ $order->user->phone }}</strong></div>
                @endif
            </div>
            
            <h6 class="mb-3">Order`s Data</h6>
            
            <table>
            @foreach($products as $product)
                <tr>
                    <td class="w-25">
                        <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap" width="200">
                    </td>
                    <td>
                        <div>
                            <div>Model: <strong class="tag-strong">{{ $product->name }}</strong></div>
                            <div>Price:
                                <strong class="tag-strong">
                                    ${{ number_format($product->price, 2, '.', ',') }}
                                </strong>
                            </div>
                            <div>Count: <strong class="tag-strong">{{ $ordersArray[$product->id] }}</strong></div>
                            <div>Total:
                                <strong class="tag-strong">
                                    ${{ number_format($product->price * $ordersArray[$product->id], 2, '.', ',') }}
                                </strong>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </table>

            <hr>
            <div>
                <form action="{{ route('orders.edit', ['id' => $order->id]) }}">
                    <div class="form-group">Status:
                        <select name="status" class="form-control mt-2">
                            @foreach($status as $item)
                            <option value="{{ $item }}" {{ $item == $order->status ? ' selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        <div class="mt-2">
                            <button class="btn btn-outline-info btn-sm">Change</button>
                        </div>
                    </div>
                </form> 

            </div>
        </div>
    </div>

</div>


@endsection
