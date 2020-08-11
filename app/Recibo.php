<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recibo extends Model
{
    use SoftDeletes;
    protected $table = "servidores_publicos";
    protected $guarded = ['id','created_at','updated_at','deleted_at'];
    public function documentos(){
        return $this->hasMany(Documento::class);
    }
    public function tipoRecibo(){
        return $this->belongsTo(TipoRecibo::class);
    }
}
