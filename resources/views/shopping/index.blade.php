@extends('layouts.master')
@section('title', "| Cart")

@section('content')

<div class="mb-5">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="mt-1 mb-4">CART DATA</h4>
          
            @foreach(Cart::content() as $product)
                <div>
                    <div class="row">
                        <div class="col-sm-8 col-md-9">
                            <div class="d-flex">
                                <div>
                                    <img class="img-fluid " src="{{ asset('storage/products/' . $product->model->image) }}" alt="Card image cap" width="200">
                                </div>
                                
                                <div class="mr-auto">
                                    <h5 class="mt-3">Model: <a href="{{ route('product', ['product' => $product->id]) }}">{{ $product->name }}</a></h5>
                                    <div>Price: {{ number_format($product->price, 2, '.', '') }}</div>
                                    <div><a href="#">Remove from cart</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="product-count-box mr-auto text-center mt-3">
                                <button type="button" class="app-counter plus-product">&plus;</button>
                                <span class="badge product-count">{{ $product->qty }}</span>
                                <button type="button" class="app-counter minus-product">&minus;</button>

                                <h5 class="mt-3">Total: $<strong class="text-danger product-price" data-price="{{ $product->price }}">{{ number_format($product->price * $product->qty, 2, '.', '') }}</strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
            @endforeach
        </div>
    </div>
    
</div> 

@endsection
