<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User IDs for quick login
    |--------------------------------------------------------------------------
    |
    | IDs used by the dev toolbar login links. Omit or set to null to skip
    | registering that route.
    |
    */
    'user_ids' => [
        'super' => 1,
        'admin' => 2,
        'user' => 3,
        'user2' => 4,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redirect after "Login as User" (ID 3)
    |--------------------------------------------------------------------------
    |
    | Route name to redirect to after logging in as the standard user. Set to
    | null to redirect back() instead (safe when your app has no user.dashboard).
    |
    */
    'redirect_after_login_user' => null,

];
