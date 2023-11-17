@props([
    'cartModal'=> false,
    'cartProducts'
])

<div class='product_items'>
    @if ($cartProducts)
        @foreach ($cartProducts as $product)
            <div>
                <div class='item'>
                    <a href="/make-up/product/{{ $product->id }}" class='productImg'>
                        <img src={{ $product->image }}/>
                    </a>

                    <div class='product_info'>
                        <div class='info_option'>
                            <a href="/make-up/product/{{ $product->id }}">
                                <p class='title'>{{ $product->title }}</p>
                            </a>

                            <p class='classification'>
                                @foreach ($product->categories as $category)
                                    <span>{{ $loop->last ? $category->name : $category->name . "," }}</span>
                                @endforeach
                            </p>

                            @if ($cartModal)
                            <div class='counter'>
                                <div class='decrement'>
													<span class='material-symbols-outlined'
                                                          product-id={{ $product->id }}>
													remove
													</span>
                                </div>
                                <p class='count'
                                   data-product-id={{ $product->id }}>{{ $product->count }}</p>
                                <div class='increment'>
													<span class='material-symbols-outlined'
                                                          product-id={{ $product->id }}>
													add
													</span>
                                </div>

                                <div class='remove'>
													<span class='material-symbols-outlined'
                                                          product-id={{ $product->id }}>
													close
												</span>
                                </div>
                            </div>
                            @else
                            <div class='counter'>
                                <p class='count'
                                   data-product-id={{ $product->id }}>Count: {{ $product->count }}</p>
                            </div>
                            @endif %

                        </div>
                        <p class='product_price'>{{ $product->price }}$</p>
                    </div>
                </div>
                <div class='line'></div>
            </div>
        @endforeach

    @else
        <p>Cart is empty</p>
    @endif
</div>
