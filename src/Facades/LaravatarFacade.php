<?php

namespace AmplifiedHQ\Laravatar\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @see \AmplifiedHQ\Laravatar\Laravatar
 */
class LaravatarFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     * @since 1.0.0
     */
    protected static function getFacadeAccessor()
    {
        return 'laravatar';
    }
}
