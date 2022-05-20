# Laravel Self-Validating Model
This package contains an extended Eloquent Model class which self-validates against validation rules specified in Model's ```rules``` property when Model is saved/updated  

Works with:
- Laravel 9
- Laravel 8
- Laravel 7
- Laravel 6

## Installation
You can install package via composer:

```bash
composer require minuteoflaravel/laravel-self-validating-model
```

## How to use
Let's say we have Contact model which extends ```Illuminate\Database\Eloquent\Model```:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
}
```

Instead of extending ```Illuminate\Database\Eloquent\Model``` we should extend ```MinuteOfLaravel\Validation\SelfValidatingModel```:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MinuteOfLaravel\Validation\SelfValidatingModel as Model;

class Contact extends Model
{
    use HasFactory;
}
```

Then just add you validation rules to the ```$rules``` property:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MinuteOfLaravel\Validation\SelfValidatingModel as Model;

class Contact extends Model
{
    use HasFactory;
    
    public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email:rfc,dns,spoof',
    ];
}
```

That's it! Model will be validated on save/update.

## Custom error messages

If you need to add your custom translatable error message then just add it as always to resources/lang/en/validation.php file.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.



