<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = 'BinhLuan';
    
    public $timestamps = false;
    
    protected $fillable = [
        'MaMon','Username','NoiDung','TrangThai'
    ];
    public function MonAn(){
        return $this->belongTo('App\MonAn','MaMon');
    } 
}
// 