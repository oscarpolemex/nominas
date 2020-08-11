<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoRecibo extends Model
{
    use SoftDeletes;
    protected $table = "tipos_recibos";
    protected $guarded = ['id','created_at','updated_at','deleted_at'];
    public function recibos(){
        return $this->hasMany(Documento::class);
    }
}
