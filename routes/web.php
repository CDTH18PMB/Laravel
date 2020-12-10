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

//================================== Kiểm tra đăng nhập ======================================

Route::group(['prefix'=>'/', 'middleware'=>'CheckLogin'], function(){

    Route::get('/', 'CTNAController@index')->name('CTNA.index');

    Route::get('/danhmuc', 'CTNAController@danhmuc')->name('CTNA.danhmuc');

    Route::get('/duyetcongthuc', 'CTNAController@duyet')->name('CTNA.duyet');
    
    Route::get('/binhluan', 'CTNAController@binhluan')->name('CTNA.binhluan');
    
    Route::get('/taikhoan', 'CTNAController@taikhoan')->name('CTNA.taikhoan');

    
    //============= Chi tiết ======================================================

    Route::get('/MonAn/{id}', 'CTNAController@show_monan')->name('CTNA.show_monan');

    Route::get('/taikhoan/{id}', 'CTNAController@show_taikhoan')->name('CTNA.show_taikhoan');


    //========================= Update ======================================================

    Route::post('/MonAn/Update/{id}', 'CTNAController@update_monan')->name('CTNA.update_monan');


    //========================= Delete ======================================================

    Route::get('/destroy/{id}', 'CTNAController@destroy_monan')->name('CTNA.destroy_monan');

    //=============== Create + Store ==============================================

    Route::get('/create_monan', 'CTNAController@create_monan')->name('CTNA.create_monan');

    Route::get('/create_danhmuc', 'CTNAController@create_danhmuc')->name('CTNA.create_danhmuc');

    Route::get('/create_taikhoan', 'CTNAController@create_taikhoan')->name('CTNA.create_taikhoan');

    Route::post('/store_monan', 'CTNAController@store_MonAn')->name('CTNA.store_monan');
});





//==================================== Login =====================================

Route::get('/login', 'AuthLoginController@getLogin')->name('Auth.getLogin');
Route::post('login', 'AuthLoginController@postLogin')->name('Auth.postLogin');
Route::get('/logout', 'AuthLoginController@getLogout')->name('Auth.getLogout');



