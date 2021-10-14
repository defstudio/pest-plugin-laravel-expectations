<?php

/** @noinspection LaravelUnknownViewInspection */

namespace Tests\Concerns;

use Illuminate\Support\Facades\Storage;

trait DefineRoutes
{
    protected function defineWebRoutes($router)
    {
        $router->get('ok', function () {
            return response()->noContent(200);
        })->name('ok');

        $router->get('no-content', function () {
            return response()->noContent();
        })->name('no-content');

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

        $router->get('download/{filename}', function ($filename) {
            Storage::put($filename, 'test');

            return Storage::download($filename, $filename);
        });

        $router->get('page', function () {
            return view('page');
        });
    }
}
