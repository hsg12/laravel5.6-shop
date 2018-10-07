@extends('layouts.master')
@section('title', "| Cart")

@section('content')

<div class="mb-5">
    <div class="row">
        <div class="col-sm-12">
            @if(! Cart::count())
                <h4 class="mt-1">Cart is empty</h4>
            @else
                <h4 class="mt-1 mb-5">Your order</h4>
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
                                        <div>Price: ${{ number_format($product->price, 2, '.', '') }}</div>
                                        
                                        <form action="{{ route('delete.from.cart', ['id' => $product->id]) }}" 
                                              method="post" 
                                              class="app-delete-form confirm-plugin-delete">

                                            @csrf
                                            @method('delete')

                                            <input type="submit" name="delete" value="Remove from cart">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-3">
                                <div class="product-count-box mr-auto text-center mt-3">
                                    <button type="button" class="app-counter plus-product">&plus;</button>
                                    <span class="badge product-count" data-productrowid="{{ $product->rowId }}">
                                        {{ $product->qty }}
                                    </span>
                                    <button type="button" class="app-counter minus-product">&minus;</button>

                                    <h5 class="mt-3">Sum: $<strong class="text-danger product-price" data-price="{{ $product->price }}">{{ number_format($product->price * $product->qty, 2, '.', '') }}</strong>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                @endforeach

                <div class="col-sm-12">
                    <h5 class="mt-3">
                        <div>Count: 
                            <strong class="text-danger total-count">{{ Cart::count() }}</strong>
                        </div>
                        <div>Total: $<strong class="text-danger total-price">{{ Cart::total(2, '.', ',') }}</strong></div>
                    </h5>
                </div>
                    
                <div class="col-sm-12 text-center my-5">
                    {!! Auth::check() ? '' : '<div class="mb-2 text-danger">You need to be authorized to continue</div>' !!}

                    <form action="{{ route('cart.checkout') }}" method="POST" id="stripe-form">

                        <fieldset {{ Auth::check() ? '' : 'disabled' }} id="app-fieldset">

                        @csrf

                        <input type="hidden" id="stripeToken" name="stripeToken">
                        <input type="hidden" 
                               id="userEmail" 
                               name="userEmail" 
                               value="{{ Auth()->user() ? Auth()->user()->email : '' }}">

                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_HFPy0sQnqO1mVmknoxo0iNmt"
                            data-amount={{ Cart::total(2, '.', '') }}
                            data-name="Online Shop"
                            data-description="Forward"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto">
                        </script>
                        </fieldset>
                    </form>
                </div>

            @endif
        </div>
    </div>
    
</div> 

@endsection
