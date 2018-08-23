@extends('layouts.master')
@section('title', "| Home")

@section('content')

    <h4 class="mb-5">{{ $product->name }}</h4>
    <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap">
    <p class="mt-5">{{ $product->description }}</p>
    <p class="mb-5">Price: ${{ $product->price }}</p>
    
    
@endsection
