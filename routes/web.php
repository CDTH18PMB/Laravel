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

    //Duyệt công thức
    Route::get('/duyetcongthuc', 'CTNAController@duyet')->name('CTNA.duyet');

    // Bình Luận
    Route::get('/binhluan', 'CTNAController@binhluan')->name('CTNA.binhluan');
    
    
    Route::get('/taikhoan', 'CTNAController@taikhoan')->name('CTNA.taikhoan');

    
    //============= Chi tiết ======================================================
    
    Route::get('/MonAn/{id}', 'CTNAController@show_monan')->name('CTNA.show_monan');

    Route::get('/taikhoan/{id}', 'CTNAController@show_taikhoan')->name('CTNA.show_taikhoan');


    //========================= Update ======================================================

    Route::post('/MonAn/Update/{id}', 'CTNAController@update_monan')->name('CTNA.update_monan');
    //sua dm
    Route::get('/DanhMuc/Update/{id}', 'CTNAController@show_DanhMuc')->name('CTNA.show_danhmuc');
    Route::post('/DanhMuc/Update/{id}', 'CTNAController@show_update_DanhMuc')->name('CTNA.show_update_danhmuc');


    //========================= Delete ======================================================

    Route::get('/destroy/{id}', 'CTNAController@destroy_monan')->name('CTNA.destroy_monan');
    //xoa dm
    Route::get('/destroyDM/{id}', 'CTNAController@destroy_danhmuc')->name('CTNA.destroy_danhmuc');

    //=============== Create + Store ==============================================

    Route::get('/create_monan/{steps}', 'CTNAController@create_monan')->name('CTNA.create_monan');

    Route::get('/create_danhmuc', 'CTNAController@create_danhmuc')->name('CTNA.create_danhmuc');

    Route::get('/create_taikhoan', 'CTNAController@create_taikhoan')->name('CTNA.create_taikhoan');

    Route::post('/store_monan/{count}', 'CTNAController@store_MonAn')->name('CTNA.store_monan');

    //Duyệt bình luận
    Route::post('/allow-comment','CTNAController@allow_comment');

    //Xoá bình luận
    Route::delete('/delete-comment','CTNAController@delete_comment');

    //Duyệt công thức
    Route::post('/allow-cook','CTNAController@allow_cook');

    //Xoá công thức
    Route::delete('/delete-cook','CTNAController@delete_cook');

    Route::get('/addStep/{steps}', 'CTNAController@addStep')->name('CTNA.addStep');

    //Tìm kiếm
    Route::get('search', 'CTNAController@getSearch')->name('CTNA.getSearch');

    Route::post('search/name', 'CTNAController@getSearchAjax')->name('search');
    //create danh muc
    Route::post('/store_danhmuc', 'CTNAController@store_DanhMuc')->name('CTNA.store_danhmuc');
    //tim kiem dm
    Route::get('timkiem','CTNAController@TimKiem')->name('CTNA.timkiem');
});





//==================================== Login =====================================

Route::get('/login', 'AuthLoginController@getLogin')->name('Auth.getLogin');
Route::post('login', 'AuthLoginController@postLogin')->name('Auth.postLogin');
Route::get('/logout', 'AuthLoginController@getLogout')->name('Auth.getLogout');



