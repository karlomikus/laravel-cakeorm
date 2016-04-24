# Laravel CakePHP ORM

Use CakePHP ORM in your Laravel 5 projects

Plase note that this package is still in development and not recommended for production use, but core of the usage works at the moment.

## Install

Via Composer

``` bash
$ composer require karlomikus/laravel-cakeorm
```

Register service provider and facade

``` php
// Service provider
Karlomikus\LaravelCakeORM\LaravelCakeORMServiceProvider::class,

// Facade
'CakeORM' => Karlomikus\LaravelCakeORM\CakeORMFacade::class,
```

Publish package configuration

``` bash
$ php artisan vendor:publish --provider="Karlomikus\LaravelCakeORM\LaravelCakeORMServiceProvider"
```

## Configuration

Configuration for package is available in `config/cakeorm.php`.

You probably want to follow CakePHPs conventions for creating tables and entities, so your folder structure should look something like:

    app/Model/Table/ - Table classes
    app/Model/Entity/ - Entity classes

## Usage

``` php
// To get connection instance
$connection = CakeORM::connection();
$games = $connection->execute('SELECT * FROM games')->fetchAll('assoc');

// All other ORM methods should work just fine
$games = TableRegistry::get('Games');
$query = $games->find();

foreach ($query as $row) {
    echo $row->name;
}
```

You should check out the [official documentation](http://book.cakephp.org/3.0/en/orm.html) for a in-depth tutorial.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## TODO

* Metadata caching configuration
* Query logging
* Multiple connections
* Artisan create tables/entities
* Support for laravel-debugbar

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.