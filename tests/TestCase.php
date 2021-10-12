<?php

namespace Tests;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/resources/database/migrations');
        $this->artisan('migrate', ['--database' => 'testbench'])->run();
    }

    protected function defineWebRoutes($router)
    {
        $router->get('ok', function () {
            return response()->noContent(200);
        })->name('ok');

        $router->get('redirect', function () {
            return redirect()->to('/ok');
        })->name('redirect');

        $router->get('redirect/out', function () {
            return redirect()->to('https://www.google.it');
        })->name('redirect.out');

        $router->get('status/{status}', function ($status) {
            return response()->json([
               'status' => $status,
           ], $status);
        });
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');

        $app['config']->set('view.paths', [
            __DIR__ . '/resources/views',
        ]);

        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        $this->filesystemSetup($app['config']);
    }

    protected function filesystemSetup($config): void
    {
        $localStorageAbsolutePath     = __DIR__ . '/storage/local';
        $secondaryStorageAbsolutePath = __DIR__ . '/storage/secondary';

        $filesystem = new Filesystem();
        $filesystem->ensureDirectoryExists($localStorageAbsolutePath);
        $filesystem->cleanDirectory($localStorageAbsolutePath);
        $filesystem->ensureDirectoryExists($secondaryStorageAbsolutePath);
        $filesystem->cleanDirectory($secondaryStorageAbsolutePath);

        Storage::fake('local');
        Storage::fake('secondary');

        $config->set('filesystems.default', 'local');
        $config->set('filesystems.disks.local.driver', 'local');
        $config->set('filesystems.disks.local.root', realpath(__DIR__ . '/storage/local'));
        $config->set('filesystems.disks.secondary.driver', 'local');
        $config->set('filesystems.disks.secondary.root', realpath(__DIR__ . '/storage/secondary'));
    }
}
