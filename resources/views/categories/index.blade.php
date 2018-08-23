@extends('layouts.master')
@section('title', "| Category: $category->name")

@section('content')

    <h4 class="mb-5">{{ $category->name }}</h4>

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
            
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('storage/products/' . $product->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('product', ['product' => $product->id]) }}">{{ $product->name }}</a>
                        </h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="card-text">
                            <span class="product-price">Price: $<small class="text-muted">{{ $product->price }}</small></span>
                            <button class="btn btn-sm btn-outline-success float-right">Bue</button>
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
    
    <ul class="app-pagination pagination justify-content-center">
        {{ $products->links() }}
    </ul>
    
@endsection