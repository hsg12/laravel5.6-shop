@extends('layouts.master')
@section('title', "| Orders")

@section('content')

<div class="row">
    <div class="col-sm-12">
        @if(! $ordersData)
            <h5>You have no any orders</h5>
        @else
            @if(auth()->user())
            <div class="mb-5" style="font-size: 16px;">
                <h5>{{ auth()->user()->name }}</h5>

                <div>Email: <strong class="tag-strong">{{ auth()->user()->email }}</strong></div>
                <div>Address: <strong class="tag-strong">{{ auth()->user()->address }}</strong></div>
                @if(auth()->user()->phone)
                    <div>Phone: <strong class="tag-strong">{{ auth()->user()->phone }}</strong></div>
                @endif
            </div>
            @endif

            <h5 class="mb-4">Order{{ count($ordersData) > 1 ? 's' : '' }}</h5>

            @foreach($ordersData as $key => $item)
            <div class="mb-5">
                        
                <table>
                @foreach($item['products'] as $product)
                    <tr>
                        <td class="w-25">
                            <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap" width="200">
                        </td>
                        <td>
                            <div class="mb-4">
                                <div>Order Date:
                                    <strong class="tag-strong">{{ $item['order']->created_at->toFormattedDateString() }}</strong>
                                </div>
                                <div>Status: <strong class="tag-strong">{{ $item['order']->status }}</strong></div>

                                <div>Model: <strong class="tag-strong">{{ $product->name }}</strong></div>
                                <div>Price:
                                    <strong class="tag-strong">
                                        ${{ number_format($product->price, 2, '.', ',') }}
                                    </strong>
                                </div>
                                <div>Count: <strong class="tag-strong">{{ orderCount($item['order'], $product->id) }}</strong></div>
                                <div>Total:
                                    <strong class="tag-strong">
                                        ${{ number_format($product->price * orderCount($item['order'], $product->id), 2, '.', ',') }}
                                    </strong>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </table>
                
                @if($key != count($ordersData) - 1) 
                <hr>
                @endif
            </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
