@extends('layouts.master')
@section('title', "| Search")

@section('content')

<div class="row">
    <div class="col-12">
        <form action="{{ route('search.result') }}" class="app-search-form" method="post">
            @csrf
            <input type="text" class="form-control" name="search" placeholder="Search product ...">
            <button class="btn"><span class="fa fa-search"></span></button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">

        @if(session()->has('query'))
            <p class="mt-2 mb-4">Your search results for <span class="text-danger">'{{ session()->get('query') }}'</span></p>
            
            @if(! session()->get('products'))
                <h5 class=>Nothing found</h5>
            @else
                <div class="table-responsive">
                    <table class="mt-4 table table-hover">
                        @foreach(session()->get('products') as $product)
                            <tr onclick="window.location='{{ route('product', ['product' => $product->id]) }}';" style="cursor: pointer;">
                                <td class="w-25">
                                    <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap" width="200">
                                </td>
                                <td>
                                    <div>Model: <strong class="tag-strong">{{ $product->name }}</strong></div>
                                    <div>Price:
                                        $<strong class="tag-strong">{{ number_format($product->price, 2, '.', ',') }}</strong>
                                    </div>
                                    <div>Category: <strong class="tag-strong">{{ $product->category->name  }}</strong></div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif

        @endif
           
    </div>
</div>

@endsection
