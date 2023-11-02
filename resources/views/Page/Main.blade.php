@extends('layout.public')
@section('content')
    <div class='carousel'>
        <img src="{{ asset('img/bcgimg.jpeg') }}"/>
    </div>
        <div class='page_title'>{{ $category ?? '' }}</div>
    <main class='main_page'>
        <div>
{{--Filters--}}
        </div>
        <div class='catalog'>
            <div class='block_sort'>
{{-- Sort--}}
            </div>
            <div class='products'>
                @foreach ($products as $product)
                    <a href="/make-up/product/{{$product->id}}" class='product'>
                        <img src="{{$product->image}}"/>
                        <div class='info'>
                            <h1>{{ $product->title }}</h1>
                            <p>{{$product->price}}$</p>
                            <div>
                                <button class='add_product' type="button" product-id={{$product->id}}>
                                    Buy
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </main>
@endsection
