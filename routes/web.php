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

$app->get('/race', function () use ($app) {
    return view('race');
});

$app->get('/info', function () use ($app) {
    return view('info');
});

$app->get('/category', function () use ($app) {
    return view('category');
});

$app->get('/test/chart', function () use ($app) {
    return view('test.test_chart');
});

// =============== data api
$app->group(['prefix' => 'api/v1'], function () use ($app) {

    $app->get('/me/daily_electricity_consumption', 'ApiController@getMyDailyElectricityConsumption');

    $app->get('/me/month_consumption', 'ApiController@getMyMonthElectricityConsumption');
});

