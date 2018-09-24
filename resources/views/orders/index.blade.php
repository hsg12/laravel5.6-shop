@extends('layouts.master')
@section('title', "| Orders")

@section('content')

<div class="row">
    <div class="col-sm-12">
        @if(! auth()->user())
            <h5>You should be logged in to see your orders</h5>
        @else
            @if(! $ordersData)
                <h5>You have no any orders</h5>
            @else
                @if(auth()->user())
                <div class="mb-5" style="font-size: 16px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div>Customer: <strong class="tag-strong">{{ auth()->user()->name }}</strong></div>
                            <div>Email: <strong class="tag-strong">{{ auth()->user()->email }}</strong></div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div>Address: <strong class="tag-strong">{{ auth()->user()->address }}</strong></div>
                            @if(auth()->user()->phone)
                                <div>Phone: <strong class="tag-strong">{{ auth()->user()->phone }}</strong></div>
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
                @endif

                <div class="text-center">

                <h5 class="mb-4">Order{{ count($ordersData) > 1 ? 's' : '' }}</h5>

                @foreach($ordersData as $key => $item)
                <div class="mb-5">
                    <div class="mb-5">
                        <div>Order Date:
                            <strong class="tag-strong">{{ $item['order']->created_at->toFormattedDateString() }}</strong>
                        </div>
                        <div>Status: <strong class="tag-strong">{{ $item['order']->status }}</strong></div>
                    </div>
                            
                    
                    @foreach($item['products'] as $product)
                        <div>
                            <div class="d-inline-block">
                                <img class="img-fluid float-left" src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="200">
                                <div class="mb-5 d-inline-block text-left">
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
                            </div>
                        </div>
                    @endforeach
                    
                    @if($key != count($ordersData) - 1) 
                    <hr>
                    @endif
                </div>
                @endforeach

                </div>
            @endif
        @endif
    </div>
</div>

@endsection
