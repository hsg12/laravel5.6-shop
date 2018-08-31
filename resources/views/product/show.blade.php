@extends('layouts.master')
@section('title', "| Home")

@section('content')
<div class="mb-5">
    <div class="row">
        <div class="col-sm-12">
            <h4>{{ $product->name }}</h4>
            <div class="mb-5">Category: <strong class="tag-strong">{{ $product->category->name  }}</strong></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap">
            <p class="mt-5">{{ $product->description }}</p>
        </div>
        <div class="col-md-4 text-center">
            <div class="my-2">
                <div>Model: <strong class="tag-strong">{{ $product->name  }}</strong></div>
                <div>Price: $<strong class="tag-strong" id="product-price" data-price="{{ $product->price }}">{{ $product->price }}</strong></div>
            </div>
            <hr>
            <div class="product-count-box">
                <button type="button" class="app-counter" id="plus-product">&plus;</button>
                <span class="badge badge-light" id="product-count">0</span>
                <button type="button" class="app-counter" id="minus-product">&minus;</button>
            </div>
            <a href="#" class="btn btn-sm btn-outline-secondary mt-3">Add To Cart</a>
        </div>
    </div>
</div>  
@endsection
