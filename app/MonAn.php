<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    protected $table = 'MonAn';

    protected $primaryKey = 'MaMon';

    protected $fillable = ['TenMon', 'AnhDaiDien', 'MoTa', 'DoKho', 'ThoiGianNau',
                             'NguyenLieu', 'LuotXem', 'LuotThich', 'NguoiTao', 'LoaiMon', 'TrangThai'];

    public function TaiKhoan()
    {
        return $this->hasOne('TaiKhoan','NguoiTao','username');
    }

    public function DanhMuc()
    {
        return $this->hasOne('DanhMuc','LoaiMon','MaLoai');
    }

    public function BinhLuan(){
       return $this->hasMany('App\BinhLuan');
    } 
}
