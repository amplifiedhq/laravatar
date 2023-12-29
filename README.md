# Laravatar

[![Latest Version on Packagist](https://img.shields.io/packagist/v/martian/laravatar.svg?style=flat-square)](https://packagist.org/packages/martian/laravatar)
[![Total Downloads](https://img.shields.io/packagist/dt/martian/laravatar.svg?style=flat-square)](https://packagist.org/packages/martian/laravatar)
![GitHub Actions](https://github.com/amplifiedhq/laravatar/actions/workflows/main.yml/badge.svg)

🚀 A lightweight and easy-to-use Laravel package that add avatars to your models using [Gravatar](https://gravatar.com), [DiceBear](https://www.dicebear.com/), [UI Avatars](https://ui-avatars.com/) or [Boring Avatar](https://boringavatars.com/)

## Supported Avatar Drivers
| Driver | Description | Supported | Link |
| --- | --- | --- | --- |
| Gravatar | Gravatar is a service for providing globally unique avatars. | Yes | [Gravatar](https://gravatar.com) |
| DiceBear | DiceBear is an avatar library for designers and developers. | Yes | [DiceBear](https://www.dicebear.com/) |
| UI Avatars | UI Avatars is an avatar library for designers and developers. | Yes | [UI Avatars](https://ui-avatars.com/) |
| Boring Avatar | Boring avatars is a tiny JavaScript React library that generates custom, SVG-based, round avatars from any username and color palette. | Yes | [Boring Avatar](https://boringavatars.com/) |

> Note: You can also add your own custom driver by implementing the `AmplifiedHQ\Laravatar\Contracts\AvatarInterface;` interface and extending the `AmplifiedHQ\Laravatar\Abstracts\BaseAvatar` class. 


## Installation
> Note: This package requires PHP 7.4 or higher.
You can install the package via composer:

```bash
composer require amplifiedhq/laravatar
```

## Register Service Provider

Add the service provider to the providers array in `config/app.php`:

```php
AmplifiedHQ\Laravatar\Providers\LaravatarServiceProvider::class,
```

## Publish Configuration File
Publish the configuration file using the following command:
```bash
php artisan vendor:publish --provider="AmplifiedHQ\Laravatar\Providers\LaravatarServiceProvider" --tag="config"
```

## Configuration
You can configure the package by editing the `config/laravatar.php` file.
- In the configuration file you can specify the default avatar driver to use across your application.

```php
'default' => env('LARAVATAR_DRIVER', 'gravatar'),
```
- If you want to change the default options for a driver, you can do so by editing the `config/laravatar.php` file.

```php

'drivers' => [
    ...
    'gravatar' => [
            'class' => \AmplifiedHQ\Laravatar\Drivers\Gravatar::class,
            'options' => [
                'size' => 96,
            ],
        ],
    ...
],
```

## Usage
In order to use the package in your model to generate an avatar on the fly, you need to add the `AmplifiedHQ\Laravatar\Traits\HasAvatar` trait to your model.

```php

namespace App\Models;

use AmplifiedHQ\Laravatar\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasAvatar;

    /** @var Avatar Column */
    protected $avatarColumn = 'email';

    /** @var Avatar Storage Column */
    protected $avatarStorageColumn = 'avatar';

    ...
}
```

> [!IMPORTANT]
> If you are using the `gravater` driver, you need to use the email column as the avatar column. If you are using the `dicebear` or `ui-avatars` or `boringavatar` driver, you can use any column as the avatar column, provided that the column is a string column. (e.g. `name`, `email`, `username` etc.)

> Note: The `HasAvatar` trait requires you to define the `$avatarColumn` and `$avatarStorageColumn` properties in your model. The `$avatarColumn` property is the column that will be used to generate the avatar. The `$avatarStorageColumn` property is the column that will be used to store the avatar.
> *WARNING*

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hendurhance.dev@gmail.com instead of using the issue tracker.

## Credits

-   [Josiah Endurance](https://github.com/hendurhance)
-   [AbdulHameed](https://github.com/AbdulHameedAnofi)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
