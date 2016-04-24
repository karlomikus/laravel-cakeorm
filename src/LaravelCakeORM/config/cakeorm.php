<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Database
    |--------------------------------------------------------------------------
    |
    | Additional configuration used in database connection
    |
    | See: http://book.cakephp.org/3.0/en/orm/database-basics.html#configuration
    |
    */
    'db_config' => [
        'persistent' => false,
        'encoding' => 'utf8',
        'timezone' => 'UTC',
        'cacheMetadata' => 'laravel-cakeorm'
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom types
    |--------------------------------------------------------------------------
    |
    | Custom type mapping
    |
    | See: http://book.cakephp.org/3.0/en/orm/database-basics.html#adding-custom-types
    |
    */

    'types' => [
        // 'json' => App\Model\Type\JsonType::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Metadata cache
    |--------------------------------------------------------------------------
    |
    | Configure ORM metadata cache
    |
    | See: http://book.cakephp.org/3.0/en/orm/database-basics.html#metadata-caching
    |
    */

    'metadata_cache' => [
        'className' => Karlomikus\LaravelCakeORM\Adapters\CacheAdapter::class,
        'duration' => '2', // in minutes
        'serialize' => true,
        'prefix' => 'laravel_cake_orm_'
    ],

];
