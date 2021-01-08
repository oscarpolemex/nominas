<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citas extends Model
{
    use SoftDeletes;

    protected $table = "citas";
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function servidorPublico()
    {
        return $this->belongsTo(ServidorPublico::class);
    }

    public function eventos()
    {
        return $this->belongsTo(Eventos::class);
    }
}
