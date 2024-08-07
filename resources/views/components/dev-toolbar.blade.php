@if (App::environment('local'))

    <div class="dark py-05 hidden md:block">

        <div class="container flex space-between va-c">

            <div class="flex space-x va-c">

                <x-gt-sidebar layout="burger-button-main" class="btn secondary outline">
                    <x-slot name="top">
                        @if (Route::has('register'))
                            <x-authit::login-register-buttons />
                        @endif
                    </x-slot>
                </x-gt-sidebar>

                <a class="ml"href="{{ route('login-super') }}">Super User</a>
                <a href="{{ route('login-admin') }}">Admin User</a>
                <a href="{{ route('login-user') }}">User User</a>

                @if (Route::has('pages.all'))
                    <a href="{{ route('pages.all') }}">Site Pages</a>
                @endif

                @if (Route::has('dev'))
                    <a href="{{ route('dev') }}">Dev</a>
                @endif

                @if (Route::has('test-email'))
                    <a href="{{ route('test-email') }}">Test Email</a>
                @endif

                <a class="btn dark" href="{{ route("admin.dashboard") }}">Admin</a>
            </div>

            @auth
                <x-authit-account-dropdown />
            @else
                @if (config('authit.allow_register'))
                    <div>
                        <a class="hover:txt-secondary mr" href="{{ route('login') }}">Sign In</a>
                        <a class="hover:txt-secondary " href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endif
