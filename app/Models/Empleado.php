<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $tipo_emple_id
 * @property int $users_id
 * @property int $idEmpleado
 * @property string $fecha_ingreso
 * @property int $Pers_id
 * @property Persona $persona
 * @property TipoEmpleado $tipoEmpleado
 * @property User $user
 * @property EvaluacionEmple[] $evaluacionEmples
 * @property Horarioasignado[] $horarioasignados
 */
class Empleado extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'empleado';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idEmpleado';

    /**
     * @var array
     */
    protected $fillable = ['tipo_emple_id', 'users_id', 'fecha_ingreso', 'Pers_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'Pers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoEmpleado()
    {
        return $this->belongsTo('App\TipoEmpleado', 'tipo_emple_id', 'tipo_emple_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluacionEmples()
    {
        return $this->hasMany('App\EvaluacionEmple', 'empl_id', 'idEmpleado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioasignados()
    {
        return $this->hasMany('App\Horarioasignado', 'empleado_empleid', 'idEmpleado');
    }
}
