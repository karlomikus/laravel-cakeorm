<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application namespace
    |--------------------------------------------------------------------------
    |
    | Default base namespace CakePHP should look in for
    | tables and entities
    |
    | See: http://book.cakephp.org/3.0/en/orm/table-objects.html#configuring-the-namespace-to-locate-orm-classes
    |
    */
    'app_namespace' => 'App\\',

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
        'cacheMetadata' => false
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
        'prefix' => 'cake_model',
        'path' => storage_path('cakeorm'),
        'serialize' => true,
        'duration' => '+2 minutes'
    ],

];
