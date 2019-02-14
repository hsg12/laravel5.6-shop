@extends('layouts.master')
@section('title', "| Category: $category->name")

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex mb-5">
                <div class="mr-auto">
                    <h4 class="mt-1">{{ $category->name }}</h4>
                </div>
                @include('layouts.cart')
            </div>
        </div>
    </div>

    @if($products->count() <= 0)
        <h5 class="empty-items-message">There are not any products yet</h5>
    @else

        <?php
            /*
                The manipulations with the code here are needed in order to correctly use the Bootstrap class 'card-deck'. 
                The task is such that there must be 3 products in a row. 
                These 3 products must be enclosed in a div with the class 'card-deck'. 
                If the products in the row are less than 3, class 'card-deck' should be replaced by my class 'redundant-deck'. All div's must be opened and closed properly.
            */

            $i = 0;
            $k = 4;
            $rowCount = floor($products->count() / 3);
            $redundant = $products->count() - ($rowCount * 3);
            $redundantClass = '';
        ?>

        @foreach($products as $key => $product)
            <?php $i++ ?>

            @if($i == 1 || $i == $k)  
                @if($i > 1)  
                    <?php $k += 3 ?>
                @endif

                @if(($redundant == 2 || $redundant == 1) && $products->count() - $redundant == $i - 1)
                    <?php $redundantClass = 'redundant-deck' ?>
                    <div class="{{ $redundantClass }} mb-4">
                @else
                    <div class="card-deck mb-4">
                @endif

            @endif
            
                <div class="card text-center app-card">
                    <div class="card-header">
                        <a href="{{ route('product', ['product' => $product->id]) }}">
                            <img class="card-img-top img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('product', ['product' => $product->id]) }}">{{ $product->name }}</a>
                        </h5>
                        <p class="card-text text-justify">{{ str_limit($product->description, 100) }}</p>
                        <hr>
                        <div>Price: $<small class="tag-strong text-muted">{{ $product->price }}</small></div>
                        <div class="overlay">
                            <div class="text">{{ str_limit($product->description, 280) }}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-text">
                            <form class="add_to_cart">
                                @csrf
                                <input type="hidden" name="product-id" value="{{ $product->id }}">
                                <button class="btn btn-sm btn-outline-info">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                </div>

            @if($i == $k - 1)
                </div>
            @endif

        @endforeach

        @if($redundantClass)
            </div>
        @endif

    @endif
    
    <div class="app-pagination pagination justify-content-center">
        {{ $products->links() }}
    </div>

    <br>   
    <br>
    
@endsection
