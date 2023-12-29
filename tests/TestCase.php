<?php

namespace AmplifiedHQ\Laravatar\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use AmplifiedHQ\Laravatar\Providers\LaravatarServiceProvider;

class TestCase extends Orchestra
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return AmplifiedHQ\Laravatar\Providers\LaravatarServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [LaravatarServiceProvider::class];
    }
}
