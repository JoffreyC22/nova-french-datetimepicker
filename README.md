Laravel Nova French Datetimepicker
===============================

## Description

This package is a basic integration of a french datetimepicker for Laravel Nova (using flatpickr).

## Installation

You may require this package using composer:

```
composer require joffreyc22/nova-french-datetimepicker
```

You can now use the FrenchDateTime class by importing it at the top of your file :

```php
use JoffreyC22\FrenchDatetimepicker\FrenchDateTime;

FrenchDateTime::make('end_date');
```

### Screens

<img src="https://raw.githubusercontent.com/JoffreyC22/nova-french-datetimepicker/master/screens/screen2.png">

The datetime field will now also appear in french in the index, detail and form parts of the field.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
