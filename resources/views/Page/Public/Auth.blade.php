@extends('Layout.Auth')
@section('content')
    <main class='container'>
        <form class='form' method="POST" action="{{ route($action) }}">
            @csrf
            <img src="{{ asset('img/bcgAuth.png') }}"/>

            <span class='auth_title'>{{ $action }}</span>

            @if ($action == 'register')
                <!-- Name -->
                <div class='block_input'>
                    <span class='material-symbols-outlined'>signature</span>
                    <div class='field_input'>
                        <label>Name</label>
                        <input autocomplete='off' id='name' type='text' label='Name' name='name' placeholder='Name...'
                               value="{{ $data_name ?? '' }}"/>
                    </div>
                </div>
            @endif

            <!-- Email Address -->
            <div class='block_input'>
                <span class='material-symbols-outlined'>mail</span>
                <div class='field_input'>
                    <label>Email</label>
                    <input autocomplete='off' id='email' type='text' label='Email' name='email' placeholder='Email...'
                           value="{{ $data_email ?? ''  }}"/>
                </div>
            </div>

            <!-- Password -->
            <div class='block_input'>
                <span class='material-symbols-outlined'>lock</span>

                <div class='field_input'>
                    <label>Password</label>
                    <input autocomplete='off' id='password' type='password' label='Password' name='password'
                           placeholder='Password...' value="{{ $data_password ?? ''  }}"/>
                </div>
            </div>
            {% for validateErrors in error %}
            <div class='error'>{{$validateErrors ?? '' }}</div>
            {% endfor %}

            <div class="errors">
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
                @error('password')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>


            <button>Get Started</button>
        </form>
        <div class='bottom_link'>
            <a to=''>Create Account</a>
            <a to=''>Need help</a>
        </div>
    </main>
@endsection
