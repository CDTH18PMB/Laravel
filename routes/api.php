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

Route::post('/Create_BinhLuan','APIController@Create_BinhLuan');
 
Route::get('/BinhLuan/{id}', 'APIController@BinhLuan'); 

Route::get('/TimTen','APIController@TimTen');

//=========================================== Món ăn =============================================

Route::get('/MonAn1', 'APIController@APIMonAnTheoTenLoai')->name('API.MonAn');

Route::get('/MonAn2', 'APIController@APIMonAnTheoTenMon')->name('API.MonAn');

Route::get('/MonAn3', 'APIController@APIMonAnHienThiTopTrending')->name('API.MonAn');

Route::get('/MonAn4', 'APIController@APIMonAnGoiY')->name('API.MonAn');

Route::get('/DanhMuc', 'APIController@DanhMuc')->name('API.DanhMuc');

Route::post('/AddFavorite', 'APIController@AddFavorite');

Route::post('/UndoFavorite', 'APIController@UndoFavorite');

Route::post('/KiemTraMonDaThich', 'APIController@KiemTraMonDaThich');

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