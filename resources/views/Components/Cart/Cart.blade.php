@props([
    'cartSum' => 0,
    'cartProducts' => [],
])


<div class='modal'>
    <div class='overlay hide_cart'>
        <div class='modal_cart'>
            <div class='title'>
                <h3>Cart</h3>
                <span class='material-symbols-outlined hide_cart'>
						close
					</span>
            </div>
            <div class='line'></div>

            <x-cart.item :cartProducts="$cartProducts" />

            <div>
                <div class="cart_error">{{ $error ?? ''}}</div>
            </div>
            <div class='total_price'>
                <div>Total price:</div>
                <div class="cart_sum"></div>
            </div>

            <div class='line'></div>
            <div class='bottom'>
                <div class='hide_cart continue'>Continue Shopping</div>
                @if ($cartProducts)
                <a href="/make-up/checkout">
                    <button>Checkout</button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
