<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $ingreso
 * @property string $salida
 */
class Horario extends Model
{
/**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'horario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'ingreso', 'salida'];

    public function empleados()
    {
        //return $this->hasMany('App\Horarioasignado', 'emp_id', 'id');
        return $this->belongsToMany('App\Models\Empleado','empleado_id')
        ->withPivot('id_hor');
    }

}