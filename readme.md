<p align="center"><a href="https://naykel.com.au" target="_blank"><img src="https://avatars0.githubusercontent.com/u/32632005?s=460&u=d1df6f6e0bf29668f8a4845271e9be8c9b96ed83&v=4" width="120"></a></p>

<a href="https://packagist.org/packages/naykel/devit"><img
src="https://img.shields.io/packagist/dt/naykel/devit" alt="Total
Downloads"></a> <a href="https://packagist.org/packages/naykel/devit"><img
src="https://img.shields.io/packagist/v/naykel/devit" alt="Latest Stable
Version"></a> <a href="https://packagist.org/packages/naykel/devit"><img
src="https://img.shields.io/packagist/l/naykel/devit" alt="License"></a>

# NAYKEL Devit

Dev toolbar for Naykel Laravel applications.

**This package should only be used in a local development environment.** Do not
install or enable it in production; routes and toolbar are gated by
`APP_ENV=local` only.

## Installation

Install the package via Composer:

```bash
composer require naykel/devit --dev
```

The service provider will be automatically registered via Laravel's package
discovery.

## Usage

### Adding the Toolbar

Include the toolbar component in your layout file (typically in
`resources/views/layouts/app.blade.php` or similar):

```html +code-blade
<x-devit::toolbar />
```

The toolbar only displays in the local environment (`APP_ENV=local`).

### Features

The toolbar provides quick access to the following development routes:

- **Super User** - Log in as user ID 1
- **Admin User** - Log in as user ID 2
- **User** - Log in as user ID 3
- **User2** - Log in as user ID 4
- **Site Pages** - Link to pages.all route (if available)
- **Dev** - Link to dev route (if available)
- **Test Email** - Send a test email to verify mail configuration
- **Admin** - Link to admin.dashboard route (if available)

### Available Routes

When in the local environment, the following routes are automatically
registered:

| Route              | Description                                      |
| ------------------ | ------------------------------------------------ |
| `GET /login-super` | Log in as super user (ID 1)                      |
| `GET /login-admin` | Log in as admin user (ID 2)                      |
| `GET /login-user`  | Log in as user (ID 3)                            |
| `GET /login-user2` | Log in as user2 (ID 4)                           |
| `GET /test-email`  | Send a test email to the configured from address |

Test email is sent to `config('mail.from.address')` so you can verify mail
configuration locally.

### Configuration

Publish the config to customize (optional):

```bash
php artisan vendor:publish --tag=devit-config
```

Or merge in your app by publishing and editing `config/devit.php`:

- **`user_ids`** – Array of keys `super`, `admin`, `user`, `user2` with user
  IDs. Set a key to `null` to disable that login route.
- **`redirect_after_login_user`** – Route name to redirect to after "Login as
  User" (e.g. `'user.dashboard'`). Default is `null`, which redirects back to
  the previous page so the package works in apps that don't define a user
  dashboard route.

### Requirements

- PHP ^8.2
- Laravel ^12.0

## License

This package is open-sourced software licensed under the MIT license.
