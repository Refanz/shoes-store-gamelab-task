<?php

use App\Controllers\Controller;
use App\Controllers\ReviewController;
use App\Controllers\ShoesController;
use App\Controllers\UserController;
use Slim\App;

return function (App $app) {

    $app->get('/', Controller::class . ':user');
    $app->get('/admin', Controller::class . ':admin');

    $app->get('/admin/users/list-user', UserController::class . ':index');
    $app->get('/admin/users/add-user', UserController::class . ':create');
    $app->post('/admin/users/add-user', UserController::class . ':insert');
    $app->post('/admin/users/delete-user/{id}', UserController::class . ':delete');
    $app->get('/admin/users/edit-user/{id}', UserController::class . ':edit');
    $app->post('/admin/users/edit-user/{id}', UserController::class . ':update');

    $app->get('/admin/product-shoes/list-shoes', ShoesController::class . ':index');
    $app->post('/admin/product-shoes/add-shoes', ShoesController::class . ':insert');
    $app->get('/admin/product-shoes/edit-shoes/{id}', ShoesController::class . ':edit');
    $app->post('/admin/product-shoes/edit-shoes', ShoesController::class . ':update');
    $app->post('/admin/product-shoes/delete-shoes/{id}', ShoesController::class . ':delete');
    $app->get('/admin/product-shoes/add-shoes', ShoesController::class . ':create');

    $app->get('/admin/review-user/list-review', ReviewController::class . ':index');
};
