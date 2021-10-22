<?php

/** @noinspection LaravelUnknownViewInspection */

namespace Tests\Concerns;

use Illuminate\Http\Request;
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
        })->name('status');

        $router->get('session', function () {
            session(['foo' => 'bar']);

            return response();
        })->name('status');

        $router->get('download/{filename}', function ($filename) {
            Storage::put($filename, 'test');

            return Storage::download($filename, $filename);
        });

        $router->get('page', function () {
            return view('page');
        });

        $router->get('staff-only', function (Request $request) {
            return response('hi', $request->pin == 1337 ? 200 : 401);
        });

        $router->get('secret', function () {
            abort(403);
        });

        $router->get('redirect-signed', function () {
            return redirect()->signedRoute('status', 200);
        });

        $router->get('json', function () {
            return response()->json([
                'foo'  => [
                    'bar' => 'baz',
                ],
                'qux'  => 1,
                'quuz' => [
                    'corge',
                    'grault',
                ],
                'foobar' => [
                    'foobar_foo' => 'foo',
                    'foobar_bar' => 'bar',
                ],
                '0'    => ['foo'],
                'bars' => [
                    ['bar' => 'foo 0', 'foo' => 'bar 0'],
                    ['bar' => 'foo 1', 'foo' => 'bar 1'],
                    ['bar' => 'foo 2', 'foo' => 'bar 2'],
                ],
                'baz' => [
                    ['foo' => 'bar 0', 'bar' => ['foo' => 'bar 0', 'bar' => 'foo 0']],
                    ['foo' => 'bar 1', 'bar' => ['foo' => 'bar 1', 'bar' => 'foo 1']],
                ],
                'barfoo' => [
                    ['bar' => ['bar' => 'foo 0']],
                    ['bar' => ['bar' => 'foo 0', 'foo' => 'foo 0']],
                    ['bar' => ['foo' => 'bar 0', 'bar' => 'foo 0', 'rab' => 'rab 0']],
                ],
                'numeric_keys' => [
                    2 => ['bar' => 'foo 0', 'foo' => 'bar 0'],
                    3 => ['bar' => 'foo 1', 'foo' => 'bar 1'],
                    4 => ['bar' => 'foo 2', 'foo' => 'bar 2'],
                ],
            ]);
        });

        $router->post('validate', function (Request $request) {
            $request->validate(['email' => 'required|email']);

            return response()->noContent(200);
        });
    }
}
