@extends('layouts.master')
@section('title', "| Home")

@section('content')
<div class="mb-5">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex mb-5">
                <div class="mr-auto">
                    <h4 class="mt-1">{{ $product->name }}</h4>
                    <div class="mb-5">Category: <strong class="tag-strong">{{ $product->category->name  }}</strong></div>
                </div>
                <div class="app-cart-badge">
                    <a href="{{ route('cart') }}" class="btn btn-sm btn-info">
                        Cart&nbsp;&nbsp;<span class="badge badge-light">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap">
            <p class="mt-5">{{ $product->description }}</p>
        </div>
        <div class="col-md-4 text-center product-data-aside">

            <div class="my-2">
                <div>Model: <strong class="tag-strong">{{ $product->name  }}</strong></div>
                <div>Price: $<strong class="tag-strong product-price" data-price="{{ $product->price }}">{{ $product->price }}</strong></div>
            </div>
            <hr>
            <div class="product-count-box">
                <button type="button" class="app-counter plus-product">&plus;</button>
                <span class="badge product-count">0</span>
                <button type="button" class="app-counter minus-product">&minus;</button>
            </div>
            
            <form action="{{ route('cart.add') }}" method="post" class="product_add_to_cart">
                @csrf
                <input type="hidden" name="product-id" value="{{ $product->id }}">
                <button class="btn btn-sm btn-outline-info mt-3">Add To Cart</button>
            </form>
            
        </div>
    </div>
</div>  
@endsection
