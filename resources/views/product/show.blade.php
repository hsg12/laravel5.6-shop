@extends('layouts.master')
@section('title', "| Home")

@section('content')
<div class="mb-5">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="mb-5">{{ $product->name }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap">
            <p class="mt-5">{{ $product->description }}</p>
        </div>
        <div class="col-md-4">
            <div class="my-2">
                <div>Category: <strong class="tag-strong">{{ $product->category->name  }}</strong></div>
                <div>Price: <strong class="tag-strong">${{ $product->price }}</strong></div>
            </div>
            <a href="#" class="btn btn-sm btn-outline-success mt-3">Add To Cart</a>
        </div>
    </div>
</div>  
@endsection
