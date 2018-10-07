<div class="app-cart-badge">
    <a href="{{ route('cart') }}" class="btn btn-sm btn-info">
        <i class="fa fa-fw fa-shopping-basket" aria-hidden="true"></i>
        Cart&nbsp;&nbsp;<span class="badge badge-light">{{ Cart::count() }}</span>
    </a>
</div>
