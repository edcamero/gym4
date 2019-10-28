<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int $tip_emp_id
 * @property int $per_id
 * @property Persona $persona
 * @property TipoEmpleado $tipoEmpleado
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
    protected $table = 'empleados';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['tip_emp_id', 'per_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'per_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoEmpleado()
    {
        return $this->belongsTo('App\TipoEmpleado', 'tipo_emple_id');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluacionEmples()
    {
        return $this->hasMany('App\EvaluacionEmple', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarioasignados()
    {
        return $this->hasMany('App\Horarioasignado', 'emp_id', 'id');
    }
}
