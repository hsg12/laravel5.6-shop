<div class="app-cart-badge">
    <a href="{{ route('cart') }}" class="btn btn-sm btn-info">
        Cart&nbsp;&nbsp;<span class="badge badge-light">{{ Cart::count() }}</span>
    </a>
</div>