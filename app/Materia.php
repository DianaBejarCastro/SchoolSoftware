<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materia extends Model
{
    protected $table = 'materias';
    use SoftDeletes;
    protected $datos = ['deleted_at'];



    public function scopeNombre($query, $nombre)
    {

        if ($nombre) {
            return $query->where('nombre', 'like', "%$nombre%");
        }
    }

    public function scopeTurno($query, $turno)
    {
        if ($turno) {
            return $query->where('turno', 'like', "%$turno%");
        }
    }

    public function scopeFecha_inicio($query, $fecha_inicio)
    {
        if ($fecha_inicio) {
            return $query->where('fecha_inicio', 'like', "%$fecha_inicio%");
        }
    }

    public function scopeFecha_final($query, $fecha_final)
    {
        if ($fecha_final) {
            return $query->where('fecha_final', 'like', "%$fecha_final%");
        }
    }
}
