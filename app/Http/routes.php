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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');




    Route::get('/', function () {
        return view('index');
    })->name('main');

Route::get('/acces_non_autorise', function () {
    return view('errors.acces_non_autorise');
})->name('acces_non_autorise');


    Route::get('/author', [
        'uses' => 'AppController@getAuthorPage',
        'as' => 'author',
        'middleware' => 'roles',
        'roles' => ['Admin', 'Auteur']
    ]);
    Route::get('/author/generate-article', [
        'uses' => 'AppController@getGenerateArticle',
        'as' => 'author.article',
        'middleware' => 'roles',
        'roles' => ['Auteur','Admin']
    ]);
    Route::get('/admin', [
        'uses' => 'AppController@getAdminPage',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
    Route::post('/admin/assign-roles', [
        'uses' => 'AppController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
    Route::get('/signup', [
        'uses' => 'AuthController@getSignUpPage',
        'as' => 'signup'
    ]);
    Route::post('/signup', [
        'uses' => 'AuthController@postSignUp',
        'as' => 'signup'
    ]);
    Route::get('/signin', [
        'uses' => 'AuthController@getSignInPage',
        'as' => 'signin'
    ]);
    Route::post('/signin', [
        'uses' => 'AuthController@postSignIn',
        'as' => 'signin'
    ]);
    Route::get('/logout', [
        'uses' => 'AuthController@getLogout',
        'as' => 'logout'
    ]);

Route::group(['middleware' => ['admin']], function () {

    Route::get('/test', [
        'uses' => 'TestController@index',
        'as' => 'test'
    ]);
});