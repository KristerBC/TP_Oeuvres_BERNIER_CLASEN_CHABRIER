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
	if (Session::get('id')==0){
		return view('formLogin');
	}
	else{
    return view('admin_template');
	}
});


Route::get('admin', function () {
	if (Session::get('id')==0){
		return view('formLogin');
	}
	else{
    return view('admin_template');
	}
});

Route::get('home', function () {
	if (Session::get('id')==0){
		return view('formLogin');
	}
	else{
    return view('home');
	}
});

Route::get('login', function () {
    return view('formLogin');
});

Route::get('formOeuvre', function () {
	if (Session::get('id')==0){
		return view('formLogin');
	}
	else{
    return view('formOeuvre');
	}
});

Route::get('formReservation', function () {
    if (Session::get('id')==0){
		return view('formLogin');
	}
	else{
    return view('formReservation');
	}
});

Route::get('reservations', function () {
    if (Session::get('id')==0){
		return view('formLogin');
	}
	else{
    return view('listeReservations');
	}
});

Route::get('oeuvres', function () {
	if (Session::get('id')==0){
		return view('formLogin');
	}
	else{

    return view('listeOeuvres');
	}
});

Route::get('deleteOeuvre', 'OeuvreController@deleteOeuvre');

Route::get('confirmReservation', 'ReservationController@confirmReservation');

Route::post('addOeuvre', 'OeuvreController@addOeuvre');
Route::post('addReservation', 'ReservationController@addReservation');
Route::post('modifyOeuvre', 'OeuvreController@modifyOeuvre');

Route::post('signIn', 'UtilisateurController@signIn');
Route::get('/signOut', 'UtilisateurController@signOut');
