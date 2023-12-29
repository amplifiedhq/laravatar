# Laravatar

[![Latest Version on Packagist](https://img.shields.io/packagist/v/martian/laravatar.svg?style=flat-square)](https://packagist.org/packages/martian/laravatar)
[![Total Downloads](https://img.shields.io/packagist/dt/martian/laravatar.svg?style=flat-square)](https://packagist.org/packages/martian/laravatar)
![GitHub Actions](https://github.com/amplifiedhq/laravatar/actions/workflows/main.yml/badge.svg)

🚀 A lightweight and easy-to-use Laravel package designed to simplify avatar generation for your Eloquent models. It provides a flexible and extensible solution for generating avatars using [Gravatar](https://gravatar.com), [DiceBear](https://www.dicebear.com/), [UI Avatars](https://ui-avatars.com/) or [Boring Avatar](https://boringavatars.com/)

## Supported Avatar Drivers
| Driver | Description | Supported | Link |
| --- | --- | --- | --- |
| Gravatar | Gravatar is a service for providing globally unique avatars. | Yes ✅️ | [Gravatar](https://gravatar.com) |
| DiceBear | DiceBear is an avatar library for designers and developers. | Yes ✅️ | [DiceBear](https://www.dicebear.com/) |
| UI Avatars | UI Avatars is an avatar library for designers and developers. | Yes ✅️ | [UI Avatars](https://ui-avatars.com/) |
| Boring Avatar | Boring avatars is a tiny JavaScript React library that generates custom, SVG-based, round avatars from any username and color palette. | Yes ✅️ | [Boring Avatar](https://boringavatars.com/) |

> [!NOTE]
> You can also add your own custom driver by implementing the `AmplifiedHQ\Laravatar\Contracts\AvatarInterface;` interface and extending the `AmplifiedHQ\Laravatar\Abstracts\BaseAvatar` class. 



## Installation
> Note: This package requires PHP 7.4 or higher.
You can install the package via composer:

```bash
composer require martian/laravatar
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

### Using the `HasAvatar` trait

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

> [!WARNING]
> The `HasAvatar` trait requires you to define the `$avatarColumn` and `$avatarStorageColumn` properties in your model. The `$avatarColumn` property is the column that will be used to generate the avatar. The `$avatarStorageColumn` property is the column that will be used to store the avatar.

### Using the Driver Methods
You can also use each driver method directly on your application either on on your controller, model or view.

#### Gravatar
```php

use AmplifiedHQ\Laravatar\Drivers\Gravatar;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function generateAvatar()
    {
        $gravatar = new Gravatar('jane@example.com');
        $gravatar->setSize(100);
        $gravatar->getUrl(); // https://www.gravatar.com/avatar/9e26471d35a78862c17e467d87cddedf?size=100
    }
}

```

#### DiceBear
```php

use AmplifiedHQ\Laravatar\Drivers\DiceBear;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function generateAvatar()
    {
        $dicebear = new DiceBear('Jane Doe');
        $dicebear->setStyle('lorelei');
        $dicebear->setSize(100);
        $dicebear->setFormat('svg');
        $dicebear->getUrl(); // https://api.dicebear.com/7.x/lorelei/svg?seed=Jane%20Doe&size=100
    }
}
```

#### Boring Avatar
```php

use AmplifiedHQ\Laravatar\Drivers\BoringAvatar;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function generateAvatar()
    {
        $boringAvatar = new BoringAvatar('Jane Doe');
        $boringAvatar->setSize(100);
        $boringAvatar->setFormat('svg');
        $boringAvatar->setVariant('marble');
        $boringAvatar->setSquare(true);
        $boringAvatar->getUrl(); // https://boring-avatars-api.vercel.app/api/avatar?size=100&variant=marble&name=Jane%20Doe&sqaure=1
    }
}

```

#### UI Avatars
```php

use AmplifiedHQ\Laravatar\Drivers\UiAvatars;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function generateAvatar()
    {
        $uiAvatars = new UiAvatars('Jane Doe');
        $uiAvatars->setSize(100);
        $uiAvatars->setFormat('svg');
        $uiAvatars->setBackgroundColor('000000'); // Hexadecimal
        $uiAvatars->setForegroundColor('ffffff'); // Hexadecimal
        $uiAvatars->setRounded(true);
        $uiAvatars->getUrl(); // https://ui-avatars.com/api/?name=Jane%20Doe&size=100&background=000000&color=ffffff&rounded=true
    }
}
    
```

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
