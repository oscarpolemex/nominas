<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServidorPublico extends Model
{
    use SoftDeletes;

    protected $table = "servidores_publicos";
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
    
    public function solicitudPrestamos()
    {
        return $this->hasMany(SolicitudPrestamo::class);
    }
}
