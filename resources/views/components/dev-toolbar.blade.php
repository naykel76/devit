@if(App::environment('local'))

    <div class="dark py-05">

        <div class="container flex space-between va-c">

            <div class="flex space-x va-c">

                <x-gt-sidebar layout="burger-button-main" class="btn secondary outline" />

                <a href="{{ route('login-super') }}">Login Super</a>
                <a href="{{ route('login-user') }}">Login User</a>
                <a href="/admin">Admin</a>

                @if(Route::has('pages.all'))
                    <a href="{{ route('pages.all') }}">Site Pages</a>
                @endif

                @if(Route::has('dev'))
                    <a href="{{ route('dev') }}">Dev</a>
                @endif

            </div>

            @auth
                <x-authit-account-dropdown />
            @else
                @if(config('naykel.allow_registrations'))
                    <div>
                        <a class="hover:txt-secondary mr" href="{{ route('login') }}">Sign In</a>
                        <a class="hover:txt-secondary " href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                @endif
            @endauth

        </div>

    </div>

@endif
