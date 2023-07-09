<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('orders', OrderController::class);
    $router->resource('projects', ProjectsController::class);
    $router->resource('slider-images', SliderController::class);
    $router->resource('team_profiles', TeamProfilesController::class);
    $router->resource('about-sections', AboutController::class);
    $router->resource('placed-orders', PlacedOrdersController::class);
    $router->resource('products', ProductController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('index-page-components', IndexPageController::class);
    $router->resource('project-categories', ProjectCategoryController::class);
});
