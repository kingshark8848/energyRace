<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
//    return $app->version();
    return redirect('/home');
});

$app->get('/home', function () use ($app) {
//    return $app->version();
    return view('home');
});

$app->post('/result', function () use ($app) {
    return view('result');
});

