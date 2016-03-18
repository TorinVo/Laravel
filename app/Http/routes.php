<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'admin'], function () {
    /**
     * Cau Hinh Phan Admin
     */
    Route::group(['middleware' => 'auth:admin'], function() {
        Route::group(['prefix' => 'admin'], function() {
            Route::get('/', 'Admin\AdminController@index');

            //Category
            Route::group(['prefix' => 'category'], function() {
                Route::get('/', 'Admin\AdminCategoryController@index');
                Route::get('add', 'Admin\AdminCategoryController@getAdd');
                Route::post('save', 'Admin\AdminCategoryController@postSave');
                Route::get('edit/{id}', ['as'=>'admin.category.getEdit','uses'=>'Admin\AdminCategoryController@getEdit']);
                Route::get('delete/{id}', ['as'=>'admin.category.getDelete','uses'=>'Admin\AdminCategoryController@getDelete']);
            });
        });
    });

    Route::group(['middleware' => 'adminislogin'], function() {
        //Login Routes...
        Route::get('/admin/login','Admin\AdminController@getLogin');
        Route::post('/admin/login','Admin\AdminController@postLogin');

        // Registration Routes...
        Route::get('admin/register', 'Admin\AdminController@getRegistration');
        Route::post('admin/register', 'Admin\AdminController@postRegistration');
    });
    
    Route::get('/admin/logout','Admin\AdminController@logout');
    Route::get('/admin/test',function(){
        return view('admin.test');
    });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

