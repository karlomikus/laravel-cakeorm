<?php
namespace Karlomikus\LaravelCakeORM;

use Illuminate\Support\Facades\Facade;

/**
 * CakeORM Facade
 *
 * @author Karlo Mikus <contact@karlomikus.com>
 * @package Karlomikus\LaravelCakeORM
 * @version 0.1.0
 */
class CakeORMFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cake.orm';
    }
}
