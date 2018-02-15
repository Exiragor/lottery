<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Lottery\BetController@index');

Route::post('/', 'Lottery\BetController@store');

Route::get('/event/', function () {
    event(new \App\Events\BetsUpdated());
    return response("This page for trigger event");
});

Route::get('/test/', function () {
    $options = array(
        'cluster' => 'ap1',
        'encrypted' => true
    );
    $pusher = new Pusher\Pusher(
        'dce1bc29d1976c2b1c2d',
        '83bb81fbda0369e79543',
        '476219',
        $options
    );

    $data['message'] = 'hello world';
    $pusher->trigger('my-channel', 'my-event', $data);
    return response("This page for trigger event");
});
