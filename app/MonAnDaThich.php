<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonAnDaThich extends Model
{
    protected $table = 'MonAnDaThich';

    protected $fillable = ['Username', 'MaMon'];

    public $timestamps = false;
}
