<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;
    protected $table = "documentos";
    protected $guarded = ['id','created_at','updated_at','deleted_at'];

    public function servidor_publico(){
        return $this->belongsTo(ServidorPublico::class);
    }
    public function recibo(){
        return $this->belongsTo(Recibo::class);
    }
}
