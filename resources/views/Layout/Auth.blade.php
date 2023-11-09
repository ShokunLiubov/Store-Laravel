<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $action ?? 'Make up' }}</title>
    <link rel="stylesheet" href="{{ asset('css/Auth.css') }}?v={{ time() }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>
<body>
<header class="site-header">
    <div class="menu">
				<span class="title">
                    {{ $action }}
				</span>
        <nav>
            <a href={{route('index') }} class="backShop">
						<span class='material-symbols-outlined'>
							arrow_back_ios
						</span>
                Back to Shop
            </a>

            @guest
                <a href="{{ route('auth', ['action' => 'register']) }}" class={{$action == 'register' ? 'active' : ''}}>
							<span class="material-symbols-outlined">
								app_registration
							</span>
                    Register
                </a>
            @endguest

            @guest
                <a href="{{ route('auth', ['action' => 'login']) }}" class={{$action == 'login' ? 'active' : ''}}>
							<span class='material-symbols-outlined'>
								how_to_reg
							</span>
                    Login
                </a>
            @endguest
        </nav>
    </div>
</header>

<div class="center">
    @yield('content')
</div>

</body>
</html>
