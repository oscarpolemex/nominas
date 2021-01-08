<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eventos extends Model
{
    use SoftDeletes;

    protected $table = "eventos";
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
}
