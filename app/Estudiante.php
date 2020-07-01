<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\SoftDeletes;


class Estudiante extends Model
{
    protected $table = 'estudiantes';
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    //Query extendemos la forma de hacer las consultas Scope
    public function scopeCi($query, $ci)
    {
        if ($ci) {
            return $query->where('ci', 'like', "%$ci%");
        }
    }
    public function scopeNombre($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'like', "%$nombre%");
        }
    }
    public function scopeApellido($query, $apellido)
    {
        if ($apellido) {
            return $query->where('apellido', 'like', "%$apellido%");
        }
    }
}
