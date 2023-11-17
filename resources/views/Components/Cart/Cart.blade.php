@props([
    'cartModal'=> false,
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

            @if ($cartModal)
            {<x-cart.item :cartProducts="$cartProducts" :cartModal="$cartModal"/>
            @endif

            <div>
                @if ($cartProducts)
                {% for error in errors %}
                <div class="cart_error">{{ $error ?? ''}}</div>
                @endif
            </div>
            <div class='total_price'>
                <div>Total price:</div>
                <div>{{ $cartSum ?? 0 }} $</div>
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
