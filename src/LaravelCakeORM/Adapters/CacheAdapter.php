<?php
namespace Karlomikus\LaravelCakeORM\Adapters;

use Cake\Cache\CacheEngine;
use Illuminate\Contracts\Cache\Repository as Cache;

/**
 * Cache Adatper
 *
 * Swap CakePHP cache engine with Laravel engine
 *
 * @author Karlo Mikus <contact@karlomikus>
 * @package Karlomikus\LaravelCakeORM\Adapters
 * @version 0.1.0
 */
class CacheAdapter extends CacheEngine
{
    /**
     * Laravel cache instance
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    private $cache;

    /**
     * Initialize the Cache Engine
     *
     * Called by CakePHP
     *
     * @param array $config
     * @return bool
     */
    public function init(array $config = [])
    {
        // Load our cache class
        $this->cache = app(Cache::class);
        parent::init($config);

        return true;
    }

    /**
     * Write value for a key into cache
     *
     * @param string $key Identifier for the data
     * @param mixed $value Data to be cached
     * @return bool True if the data was successfully cached, false on failure
     */
    public function write($key, $value)
    {
        $this->cache->put($key, $value, 2);

        return true;
    }

    /**
     * Read a key from the cache
     *
     * @param string $key Identifier for the data
     * @return mixed The cached data, or false if the data doesn't exist, has expired, or if there was an error fetching it
     */
    public function read($key)
    {
        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        return false;
    }

    /**
     * Increment a number under the key and return incremented value
     *
     * @param string $key Identifier for the data
     * @param int $offset How much to add
     * @return bool|int New incremented value, false otherwise
     */
    public function increment($key, $offset = 1)
    {
        return $this->cache->increment($key, $offset);
    }

    /**
     * Decrement a number under the key and return decremented value
     *
     * @param string $key Identifier for the data
     * @param int $offset How much to subtract
     * @return bool|int New incremented value, false otherwise
     */
    public function decrement($key, $offset = 1)
    {
        return $this->cache->decrement($key, $offset);
    }

    /**
     * Delete a key from the cache
     *
     * @param string $key Identifier for the data
     * @return bool True if the value was successfully deleted, false if it didn't exist or couldn't be removed
     */
    public function delete($key)
    {
        return $this->cache->forget($key);
    }

    /**
     * Delete all keys from the cache
     *
     * @param bool $check if true will check expiration, otherwise delete all
     * @return bool True if the cache was successfully cleared, false otherwise
     */
    public function clear($check)
    {
        return $this->cache->flush();
    }
}
