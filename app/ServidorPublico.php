<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServidorPublico extends Model
{
    use SoftDeletes;
    protected $table = "servidores_publicos";
    protected $guarded = ['id','created_at','updated_at','deleted_at'];
}
