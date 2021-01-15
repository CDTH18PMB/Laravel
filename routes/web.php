<?php

//================================== Kiểm tra đăng nhập ======================================

Route::group(['prefix'=>'/', 'middleware'=>'CheckLogin'], function(){

    //======================================== INDEX ===================================================

    Route::get('/', 'CTNAController@index')->name('CTNA.index');

    Route::get('/danhmuc', 'CTNAController@danhmuc')->name('CTNA.danhmuc');

    //Duyệt công thức
    Route::get('/duyetcongthuc', 'CTNAController@duyet')->name('CTNA.duyet');

    // Bình Luận
    Route::get('/binhluan', 'CTNAController@binhluan')->name('CTNA.binhluan');

    //  tài khoản
    Route::get('/taikhoan', 'CTNAController@taikhoan')->name('CTNA.taikhoan');
    
    //=========================================== Chi tiết ======================================================
    
    Route::get('/MonAn/{id}', 'CTNAController@show_monan')->name('CTNA.show_monan');

    //sua dm
    Route::get('/DanhMuc/Update/{id}', 'CTNAController@show_DanhMuc')->name('CTNA.show_danhmuc');

    //  chi tiết tài khoản
    Route::get('/taikhoan/{id}', 'CTNAController@show_taikhoan')->name('CTNA.show_taikhoan');

    //=========================================== Update ======================================================

    Route::post('/MonAn/Update/{id}', 'CTNAController@update_monan')->name('CTNA.update_monan');
    
    Route::post('/DanhMuc/Update/{id}', 'CTNAController@show_update_DanhMuc')->name('CTNA.show_update_danhmuc');

    //  xử lý cập nhật tài khoản
    Route::post('/TaiKhoan/Update/{id}', 'CTNAController@update_taikhoan')->name('CTNA.update_taikhoan');

    //============================================= Delete =============================================

    Route::get('/delete/{id}', 'CTNAController@delete')->name('CTNA.delete');

    Route::get('/restore/{id}', 'CTNAController@restore')->name('CTNA.restore');

    Route::get('/destroy/{id}', 'CTNAController@destroy_monan')->name('CTNA.destroy_monan');
    //xoa danh mục
    Route::get('/destroyDM/{id}', 'CTNAController@destroy_danhmuc')->name('CTNA.destroy_danhmuc');

    //Xoá công thức
    Route::delete('/delete-cook','CTNAController@delete_cook');

     // xử lý khoá tài khoản
     Route::get('/lockout_taikhoan/{id}', 'CTNAController@lockout_taikhoan')->name('CTNA.lockout_taikhoan');
     // xử lý mở khoá tài khoản
     Route::get('/open_taikhoan/{id}', 'CTNAController@open_taikhoan')->name('CTNA.open_taikhoan');

    //Xoá bình luận
    Route::delete('/delete-comment','CTNAController@delete_comment');

    //========================================= Create + Store ==============================================

    Route::get('/create_monan', 'CTNAController@create_monan')->name('CTNA.create_monan');

    Route::get('/addStep', 'CTNAController@addStep')->name('CTNA.addStep');

    Route::get('/create_danhmuc', 'CTNAController@create_danhmuc')->name('CTNA.create_danhmuc');

    // Route::get('/create_taikhoan', 'CTNAController@create_taikhoan')->name('CTNA.create_taikhoan');

    Route::post('/store_monan', 'CTNAController@store_MonAn')->name('CTNA.store_monan');

    //create danh muc
    Route::post('/store_danhmuc', 'CTNAController@store_DanhMuc')->name('CTNA.store_danhmuc');

    //  thêm tài khoản
    Route::get('/create_taikhoan', 'CTNAController@create_taikhoan')->name('CTNA.create_taikhoan');

    //  xử lý thêm tài khoản
    Route::post('/store_taikhoan', 'CTNAController@store_TaiKhoan')->name('CTNA.store_taikhoan');

    //====================================== Lọc + Sắp xếp ========================================

    Route::get('/filter_monan', 'CTNAController@filter_monan')->name('CTNA.filter_monan');

    Route::get('/sort_monan', 'CTNAController@sort_monan')->name('CTNA.sort_monan');
    
    //======================================== TÌM KIẾM ===============================================
   
    // tìm kiếm món ăn
    Route::get('search_monan', 'CTNAController@search_monan')->name('CTNA.search_monan');
    
    //tim kiem danh muc
    Route::get('timkiem','CTNAController@TimKiem')->name('CTNA.timkiem');

    //  xử lý tìm kiếm tài khoản
    Route::post('search/taikhoan', 'CTNAController@search_taikhoan')->name('CTNA.search_taikhoan');

    //Tìm kiếm
    Route::get('search', 'CTNAController@getSearch')->name('CTNA.getSearch');

    Route::post('search/name', 'CTNAController@getSearchAjax')->name('search');

    //======================================== DUYỆT ===========================================

    //Duyệt bình luận
    Route::post('/allow-comment','CTNAController@allow_comment');

    //Duyệt công thức
    Route::post('/allow-cook','CTNAController@allow_cook');

});



//==================================== Login =====================================

Route::get('/login', 'AuthLoginController@getLogin')->name('Auth.getLogin');
Route::post('login', 'AuthLoginController@postLogin')->name('Auth.postLogin');
Route::get('/logout', 'AuthLoginController@getLogout')->name('Auth.getLogout');



