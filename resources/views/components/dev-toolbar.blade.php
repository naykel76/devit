@if(App::environment('local'))

    <div class="dark py-05">

        <div class="container flex space-between va-c">

            <div class="flex space-x va-c">
                <x-gt-sidebar layout="burger-button-main" />

                {{-- @if (Route::has('login-super'))

                @endif --}}
                <a href="{{ route('login-super') }}">Login Super</a>
                <a href="{{ route('login-user') }}">Login User</a>
                <a href="/admin">Admin</a>
                @if(Route::has('pages.all'))
                    <a href="{{ route('pages.all') }}">All Pages</a>
                @endif
                @if(Route::has('dev'))
                    <a href="{{ route('dev') }}">Dev</a>
                @endif
            </div>

            @auth
                <x-authit-account-dropdown />
            @else
                <div>
                    <a class="hover:txt-secondary mr" href="{{ route('login') }}">Sign In</a>
                    <a class="hover:txt-secondary " href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            @endauth

        </div>

    </div>

@endif
