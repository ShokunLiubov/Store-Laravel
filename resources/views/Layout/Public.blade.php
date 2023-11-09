<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/Public.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/Cart.css') }}?v={{ time() }}">
    <title>{{ $title ?? 'Make Up' }}</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>

</head>
<body>
<div class='header'>
    <div class='top'>
        <span>100% original products!</span>
        <ul>
            <li><a href=''>Actions</a></li>
            <li><a href=''>MAKEUP Club</a></li>
            <li><a href=''>Delivery and Payment</a></li>
            <li><a href=''>Articles</a></li>
            <li><a href=''>About the store</a></li>
        </ul>
        <span>Office</span>
    </div>
    <div class='bottom'>
        <div class='bottom_left'>
            <a href=''>0(800) 50 77 40</a>
            <p>Every day from 7:55 to 20:05</p>
            <button>Call back</button>
        </div>

        <a class='bottom_middle' href={{ route('index') }}>
            <img src="{{ asset('img/logo.svg') }}"/>
        </a>
        <div class='bottom_right'>
            <div class='user_auth'>
                @guest
                    <a class="login" href={{ route('auth', ['action' => 'login']) }}>
                        <span class='material-symbols-outlined'>person</span>
                    </a>
                @endguest

                <div class='auth_block'>

                    <div>{{ Auth::user()->name ?? 'Guest'}} </div>

                    @auth
                        <a class='orders'>
						<span href={{ 'gggg' }} class="material-symbols-outlined">
							list_alt
						</span>
                        </a>

                        <a class='logout' href="{{ route('logout') }}">
                            <span class='material-symbols-outlined'>logout</span>
                        </a>
                    @endauth
                </div>
            </div>

            <div class="cart-content">
                {{--cart modal--}}
            </div>

            <div class='cart'>
						<span class="material-symbols-outlined">
							shopping_bag
						</span>
            </div>

            <form class='search' method="get" action={{''}}>
                <input name='search' value="{{''}}" autocomplete='off' type='search' placeholder='Search...'/>
                <button type='submit'>
                    <span class='material-symbols-outlined'>search</span>
                </button>
            </form>

        </div>
    </div>
</div>
<div class='container'>
    <nav class='menu'>
        <ul>
            @foreach($menu as $item)
                <li>
                    <a href="{{route('category', ['category' => $item->slug])}}">{{ $item->name }}</a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</div>
</body>
</html>

