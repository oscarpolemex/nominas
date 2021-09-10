<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitudPrestamo extends Model
{
    use SoftDeletes;

    protected $table = "solicitud_prestamos";
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    
    public function servidorPublico()
    {
        return $this->belongsTo(ServidorPublico::class);
    }
}
