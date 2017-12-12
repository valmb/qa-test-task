<?php




Route::get('/', 'HomeController@getHome' );
Route::get('/take-apple/{user_id}', 'HomeController@getTakeApple' );
Route::get('/free-apples', 'HomeController@getFreeApples' );

