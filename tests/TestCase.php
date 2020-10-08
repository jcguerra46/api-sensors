<?php

use Illuminate\Support\Facades\Artisan;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    static $setUpHasRunOnce = false;

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }


    public function setUp(): void
    {
        parent::setUp();

        // Solo se ejecuta una vez
        if (!static::$setUpHasRunOnce) {
            echo(PHP_EOL . 'Running Migrations and DatabaseSeeder...' . PHP_EOL);
            Artisan::call('migrate:refresh');
            Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
            static::$setUpHasRunOnce = true;
        }
    }
}
