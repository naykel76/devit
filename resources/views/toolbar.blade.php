{{-- 
Do NOT convert to component <x-devit::toolbar />. Blade resolves components at
compile time and will crash in production when the dev package is not installed.
--}}
<div class="dark flex space-x va-c p-ctrl">
    @if (Route::has('login-super'))
        <a class="ml" href="{{ route('login-super') }}">Super User</a>
    @endif
    @if (Route::has('login-admin'))
        <a href="{{ route('login-admin') }}">Admin User</a>
    @endif

    @if (Route::has('login-user'))
        <a href="{{ route('login-user') }}">User</a>
    @endif

    @if (Route::has('login-user2'))
        <a href="{{ route('login-user2') }}">User2</a>
    @endif

    @if (Route::has('pages.all'))
        <a href="{{ route('pages.all') }}">Site Pages</a>
    @endif

    @if (Route::has('dev'))
        <a href="{{ route('dev') }}">Dev</a>
    @endif

    @if (Route::has('test-email'))
        <a href="{{ route('test-email') }}">Test Email</a>
    @endif

    @if (Route::has('admin.dashboard'))
        <a class="btn dark" href="{{ route('admin.dashboard') }}">Admin</a>
    @endif
</div>
