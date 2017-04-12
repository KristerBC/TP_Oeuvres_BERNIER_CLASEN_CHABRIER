<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('admin_template');
});


Route::get('admin', function () {
    return view('admin_template');
});

Route::get('home', function () {
    return view('home');
});

Route::get('login', function () {
    return view('formLogin');
});

Route::get('formOeuvre', function () {
    return view('formOeuvre');
});

Route::get('formReservation', function () {
    return view('formReservation');
});

Route::get('reservations', function () {
    return view('listReservations');
});

Route::get('oeuvres', function () {
    return view('listOeuvres');
});


Route::get('test', 'IndexController@index');



Route::post('signIn', 'UtilisateurController@signIn');
Route::get('/signOut', 'UtilisateurController@signOut');
