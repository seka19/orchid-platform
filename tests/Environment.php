<?php

namespace Orchid\Platform\Tests;

use Watson\Active\Facades\Active;
use Orchid\Platform\Facades\Alert;
use Illuminate\Support\Facades\Schema;
use Orchid\Platform\Facades\Dashboard;
use Orchid\Platform\Providers\FoundationServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

trait Environment
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();

        $this->refreshTestDatabase();
        Schema::defaultStringLength(191);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // set up database configuration
        $app['config']->set('database.connections.orchid', [
            'driver'   => 'mysql',
            'host'     => 'localhost',
            'port'     => '3306',
            'database' => 'orchid',
            'username' => 'root',
            'password' => 'orchid',
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
            'sslmode'  => 'prefer',
        ]);
        $app['config']->set('database.default', 'orchid');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            FoundationServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Dashboard' => Dashboard::class,
            'Alert'     => Alert::class,
            'Active'    => Active::class,
        ];
    }
}
