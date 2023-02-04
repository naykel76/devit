@if(App::environment('local'))

    <div class="dark py-05">

        <div class="container flex space-between va-c">

            <div class="flex space-x">
                <a href="{{ route('login-user1') }}">Quick Login</a>
                <a href="/admin">Admin</a>
                @if(Route::has('pages.all'))
                    <a href="{{ route('pages.all') }}">All Pages</a>
                @endif
                @if(Route::has('dev'))
                    <a href="{{ route('dev') }}">Dev</a>
                @endif
            </div>

            @if(Route::has('login'))

                <div>

                    @auth
                        <x-authit-account-dropdown />
                    @endauth

                </div>

            @endif

        </div>
    </div>
@endif
