<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//======================================== Login + Logout======================================================

Route::post('/CheckLogin', 'APIController@CheckLogin');

Route::get('/Logout', 'APIController@Logout');

//======================================== SignUp =================================================

Route::post('/SignUp', 'APIController@SignUp');

//======================================================================================
Route::get('/MonAn', 'APIController@index')->name('API.MonAn');

Route::get('/DanhMuc', 'APIController@DanhMuc')->name('API.DanhMuc');

Route::get('/TaiKhoan', 'APIController@TaiKhoan')->name('API.TaiKhoan');



Route::post('/Create_MonAn', 'APIController@Create_MonAn');

Route::post('/Create_HuongDan', 'APIController@Create_HuongDan');

Route::get('/MonAn/{id}', 'APIController@ChiTietMonAn');

Route::get('/HuongDan/{id}', 'APIController@HuongDan'); 

//=================================== Update ===================================================

Route::post('/Update_TaiKhoan', 'APIController@Update_TaiKhoan');

Route::post('/Update_TaiKhoan_AnhDaiDien', 'APIController@Update_TaiKhoan_AnhDaiDien');

// Route::get('/TaiKhoan','CTNAController@APITaiKhoan')->name('API.TaiKhoan');
// Route::get('/TaiKhoan/{id}','CTNAController@store_apitaikhoan')->name('API1.TaiKhoan');

// Route::post('/TaiKhoan1','CTNAController@APITaiKhoan1')->name('API2.TaiKhoan');

// Route::get('/MonAn','CTNAController@APIMonAn')->name('API.MonAn');

//Route::get('/DanhMuc','CTNAController@APIDanhMuc')->name('API.DanhMuc');
//Route::get('/DanhMuc1/{id}','CTNAController@store')->name('store.DanhMuc');

//=========================================== Tài Khoản ===========================================
//danh sách TK
Route::get('/index_taikhoan', 'APIController@index_taikhoan');
//chi tiết TK
Route::get('/detail_taikhoan/{username}','APIController@detail_taikhoan');
//thêm TK
Route::post('/create_taikhoan', 'APIController@create_taikhoan');
//cập nhật TK
Route::patch('/update_taikhoan/{username}', 'APIController@update_taikhoan');
//xoá TK
 Route::delete('/delete_taikhoan/{username}', 'APIController@delete_taikhoan');

 //danh sách món đã tạo
 Route::get('/show_mondatao/{nguoitao}', 'APIController@show_mondatao');
 //danh sách món đã thích
 Route::get('/show_mondathich/{username}', 'APIController@show_mondathich');
//tăng lượt xem
 Route::post('/plus_luotxem/{id}', 'APIController@plus_luotxem');
//cập nhật trạng thái xoá
Route::post('/delete_mondatao/{id}', 'APIController@delete_mondatao');
//Xoá món đã thích cập nhật lại lượt thích
Route::post('/unlike_mondathich/{id}', 'APIController@unlike_mondathich');