<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $router->bind( 'post', function ( $slug ) {
            return \App\Models\Post::where( 'slug', $slug )->first();
        });

        $router->bind( 'page_slug', function ( $slug ) {
            return \App\Models\Page::where( 'slug', $slug )->first();
        });

        $router->bind( 'user_slug', function ( $slug ) {
            return \App\Models\User::where( 'slug', $slug )->first();
        });

        $router->bind( 'admin_slug', function ( $slug ) {
            return \App\Models\Admin::where( 'slug', $slug )->first();
        });

        $router->bind( 'banner_id', function ( $id ) {
            return \App\Models\Image::find($id);
        });

    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
