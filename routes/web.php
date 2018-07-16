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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pub', function () {
    return App\Post::published()->get();
});

Route::get('/blog', 'Manage\PostsController@blog');

Route::get('/test', function () {
    return view('horoscopes.manager');
});

Auth::routes();

Route::prefix('manage')->middleware('role:superadmin|admin|editor|author')->group(function() {

    Route::get('/','Manage\ManageController@index');
    Route::get('/dashboard','Manage\ManageController@dashboard')->name('manage.dashboard');

    Route::get('/category/create', 'Manage\CategoryController@create')->name('category.create');
    Route::get('/categories', 'Manage\CategoryController@index')->name('categories');
    Route::post('/category/store', 'Manage\CategoryController@store')->name('category.store');
    Route::get('/category/edit/{slug}', 'Manage\CategoryController@edit')->name('category.edit');
    Route::get('/category/delete/{id}', 'Manage\CategoryController@destroy')->name('category.delete');
    Route::post('/category/update/{id}', 'Manage\CategoryController@update')->name('category.update');

    Route::get('/tags', 'Manage\TagController@index')->name('tags');
    Route::get('/tag/edit/{slug}', 'Manage\TagController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'Manage\TagController@update')->name('tag.update');
    Route::get('/tag/delete/{id}', 'Manage\TagController@destroy')->name('tag.delete');
    Route::get('/tag/create', 'Manage\TagController@create')->name('tag.create');
    Route::post('/tag/store', 'Manage\TagController@store')->name('tag.store');

    Route::get('/post/create', 'Manage\PostsController@create')->name('post.create');
    Route::get('/posts', 'Manage\PostsController@index')->name('posts');
    Route::get('/post/{slug}', 'Manage\PostsController@show')->name('post.show');
    Route::get('/post/edit/{id}', 'Manage\PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'Manage\PostsController@update')->name('post.update');
    Route::post('/post/store', 'Manage\PostsController@store')->name('post.store');
    Route::get('/post/delete/{id}', 'Manage\PostsController@destroy')->name('post.delete');

    Route::get('/users', 'Manage\UserController@index')->name('users');
    Route::get('/user/create', 'Manage\UserController@create')->name('user.create');
    Route::get('/user/{id}', 'Manage\UserController@show')->name('user.show');
    Route::get('/user/edit/{id}', 'Manage\UserController@edit')->name('user.edit');
    Route::post('/user/update/{id}', 'Manage\UserController@update')->name('user.update');
    Route::post('/user/store', 'Manage\UserController@store')->name('user.store');
    Route::get('user/delete/{id}', 'Manage\UserController@destroy')->name('user.delete');
//
    Route::get('/permissions', 'Manage\PermissionController@index')->name('permissions.index');
    Route::get('/permissions/create', 'Manage\PermissionController@create')->name('permissions.create');
    Route::post('/permissions/store', 'Manage\PermissionController@store')->name('permissions.store');
    Route::get('/permissions/{id}', 'Manage\PermissionController@show')->name('permissions.show');
    Route::get('/permissions/edit/{id}', 'Manage\PermissionController@edit')->name('permissions.edit');
    Route::post('/permissions/update/{id}', 'Manage\PermissionController@update')->name('permissions.update');
    Route::get('/permissions/delete/{id}', 'Manage\PermissionController@destroy')->name('permissions.destroy');

    //Route::resource('/permissions', 'Manage\PermissionController');

    Route::resource('/roles', 'Manage\RoleController', ['except' => 'destroy']);


});

Route::prefix('horoscope')->group(function() {

   // Route::get('/test', 'HoroscopeController@index')->name('test');
    Route::get('/create', 'HoroscopeController@create')->name('horoscope.create');
    Route::get('/horoscopes', 'HoroscopeController@index')->name('horoscopes');
    Route::get('/{id}', 'HoroscopeController@show')->name('horoscope.show');
    Route::get('/edit/{id}', 'HoroscopeController@edit')->name('horoscope.edit');
    Route::post('/update/{id}', 'HoroscopeController@update')->name('horoscope.update');
    Route::post('/store', 'HoroscopeController@store')->name('horoscope.store');
    Route::get('/delete/{id}', 'HoroscopeController@destroy')->name('horoscope.delete');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/gethoro', 'HoroscopeController@getHoro');

// view composer
View::composer(['composer1','composer2'], function($view) { //moze i iz providera da se kreira composer
    $user = Auth::user();
    $view->with('user', $user);
});

Route::get('/composer', function() {
    return view('composer'.rand(1,2)); 
} );

Route::get('/composer-provider', function() { //view preko service providera
    return view('composer3'); 
} );
