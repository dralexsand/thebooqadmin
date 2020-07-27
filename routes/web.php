<?php
    
    use Illuminate\Support\Facades\Route;
    
    
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/delete_article/{id}', 'SiteController@delete_article');
    Route::get('/new_articles', 'SiteController@new_articles');
    Route::get('/updated_articles', 'SiteController@updated_articles');
    Route::get('/new_tags', 'SiteController@new_tags');
    Route::get('/updated_tags', 'SiteController@updated_tags');
    
    Route::get('/editarticle/{tag}', 'SiteController@editarticle');
    Route::post('/store', 'SiteController@store');
    
    
    
    Route::get('/charts', function () {
        return view('charts');
    });
    
    Route::get('/tables', function () {
        return view('tables');
    });
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
