<?php
namespace Karlomikus\LaravelCakeORM;

use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use Cake\Database\Driver\Postgres;
use Cake\Database\Driver\Sqlite;
use Cake\Database\Driver\Sqlserver;
use Cake\Datasource\ConnectionManager;
use Illuminate\Container\Container;
use Karlomikus\LaravelCakeORM\Exceptions\InvalidDriverException;

/**
 * Cake ORM Manager
 *
 * @author Karlo Mikus <contact@karlomikus.com>
 * @package Karlomikus\LaravelCakeORM
 * @version 0.1.0
 */
class CakeORMManager
{
    /**
     * Container instance
     *
     * @var \Illuminate\Container\Container
     */
    protected $app;

    /**
     * CakePHP database drivers mapper
     *
     * @var array
     */
    protected $drivers = [
        'mysql' => Mysql::class,
        'pgsql' => Postgres::class,
        'sqlite' => Sqlite::class,
        'sqlserver' => Sqlserver::class,
    ];

    /**
     * Initialize database connection
     *
     * @param \Illuminate\Container\Container $container
     */
    public function __construct(Container $container)
    {
        $this->app = $container;
    }

    /**
     * Get CakePHP connection instance
     *
     * @param  string $name
     * @return \Cake\Datasource\ConnectionInterface
     */
    public static function connection($name = 'default')
    {
        return ConnectionManager::get($name);
    }

    /**
     * Configure CakePHP database manager
     *
     * @return void
     */
    public function setupManager()
    {
        $connection = env('DB_CONNECTION', 'mysql');
        $config = $this->app['config']['database.connections'][$connection];

        $databaseConfig = [
            'className' => Connection::class,
            'driver' => $this->resolveDriver($config['driver']),
            'database' => $config['database'],
            'username' => $config['username'],
            'password' => $config['password']
        ];

        ConnectionManager::config('default', array_merge($databaseConfig, config('cakeorm.db_config', [])));
    }

    /**
     * Resolve CakePHP database driver
     *
     * @param  string $driver
     * @return string
     * @throws InvalidDriverException
     */
    protected function resolveDriver($driver)
    {
        if (array_key_exists($driver, $this->drivers)) {
            return $this->drivers[$driver];
        }

        throw new InvalidDriverException('Unable to find a CakePHP database driver for a given connection!');
    }
}
