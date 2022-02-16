<?php

//トップ画面
Route::get('/', 'ArticleController@index')->name('index');
Route::get('/index/search', 'ArticleController@search')->name('search');


/*==========================================================================
|ログイン後のみアクセス可能
==========================================================================*/
Route::group(['middleware' => 'auth'],function()
{
    //マイページ
    Route::get('/mypage','UserController@mypage')->name('mypage');
    //マイページ編集機能
    Route::get('/mypage/{id}/edit','UserController@edit')->name('user.edit');
    Route::put('/mypage/{id}','UserController@update')->name('user.update');

    //記事投稿画面
    Route::get('/create', 'ArticleController@getCreate')->name('getCreate');
    Route::post('/create', 'ArticleController@postCreate')->name('postCreate');
    //記事編集機能
    Route::get('/articles/{id}/edit', 'ArticleController@edit')->name('edit');
    Route::post('/articles/{id}', 'ArticleController@update')->name('update');
    //記事削除機能
    Route::delete('/articles/{id}', 'ArticleController@destroy')->name('destroy');

    //ログアウト
    Route::get('/logout','USerController@getLogout')->name('logout');
});

/*==========================================================================
|Auth関連
==========================================================================*/
//ユーザー登録機能
Route::get('/register','UserController@create')->name('register');
Route::post('/register','UserController@store');
//登録完了画面
Route::get('register/popup','UserController@getPopup')->name('popup');
//ログイン
Route::get('/login','UserController@getLogin')->name('getLogin');
Route::post('/login','UserController@postLogin')->name('postLogin');



