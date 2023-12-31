@extends('Layout.Public')
@section('content')
    <main>
        <MenuStore/>
        <div class='product_page'>
            <div class='product_page__top'>
                <div class='product_text'>
                    <div>
                        <span class='title'>{{ strtoupper($product->title) }}</span>
                    </div>
                    <div>
                        <span class='highlight'>Category:</span>
                        <span>
                           @foreach ($product->categories as $category)
                                <span>{{ $loop->last ? $category->name : $category->name . "," }}</span>
                            @endforeach
                        </span>
                    </div>
                    <div>
                        <span class='highlight'>Made in:</span>
                        <span>{{$product->made}}</span>
                    </div>
                </div>
                <div class='product_img'>
                    <img src={{$product->image}}/>
                </div>
                <div class='product_buy'>
                    <div>
						<span class='price'>
                            {{$product->price}}
							$
						</span>
                    </div>
                    <div>
						<span>
                            {{$product->quantity > 0 ? 'Availability!' : 'Not available!'}}
						</span>
                    </div>

                    <div>
                        @if ($product->quantity > 0)
                            <button class='buttonProduct add_product' product-id={{$product->id}}>
                                Buy
                            </button>
                        @else
                            <button class='button_notify'>
                                Notify about appearance
                            </button>
                        @endif
                    </div>

                    <div class='icon_block'>
                        <span class='material-symbols-outlined'>package</span>
                        <span>Free shipping from 300$</span>
                    </div>
                    <div class='icon_block'>
						<span class='material-symbols-outlined'>
							workspace_premium
						</span>
                        <span>Guarantee</span>
                    </div>
                </div>
            </div>

            <div class='product_page__bottom'>
                <div class='product_description'>
					<span class='title'>Description
						{{$product->title}}</span>
                    <span>{{$product->description}}</span>
                </div>
            </div>
        </div>
    </main>
@endsection
