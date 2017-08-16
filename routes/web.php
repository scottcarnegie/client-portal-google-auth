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

Route::group(['prefix' => 'login'],function () {
    Route::get('/',[
        'uses' => 'GoogleUserController@loadSignIn',
        'as' => 'login'
    ]);

    Route::post('/post-session',[
        'uses' => 'GoogleUserController@createUserSession',
        'as' => 'create-user-session'
    ]);
});

Route::get('/signoutuser',[
    'uses' => 'GoogleUserController@userSignOut',
    'as' => 'signoutuser'
]);

Route::group(['middleware' => 'validate.google'],function(){

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/new',function (){
        return view('client.new');
    })->name('new-client-form');

    Route::post('/create-client',[
        'uses' => 'ClientController@createClient',
        'as' => 'create-client'
    ]);

    Route::get('/details/{id}',[ 
        'uses' =>'ClientController@getClientDetails' ,
        'as' => 'details'
    ]);

    Route::get('/profile/{id}',[ 
        'uses' =>'ClientController@getClientProfile' ,
        'as' => 'profile'
    ]);

    Route::put('/update-client-details',[
        'uses' => 'ClientController@setClientDetails',
        'as' => 'update-client-details'
    ]);

    Route::get('/search', function(){
        return view('client.search');
    })->name('client-search');

    Route::get('/search-clients',[
        'uses' => 'ClientController@searchClients',
        'as' => 'search-clients'
    ]);

});

Route::group(['middleware'=>'validate.google', 'prefix' => 'api'],function () {
    Route::post('/create',[
        'uses' => 'LogController@createLog',
        'as' => 'create-log'
    ]);
});
