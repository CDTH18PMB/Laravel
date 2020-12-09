<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HuongDan extends Model
{
    protected $table = 'HuongDan';  
    protected $fillable = ['MaMon', 'CacBuocLam', 'HinhAnh'];
    public $timestamps = false;
}
