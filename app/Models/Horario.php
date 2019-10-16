<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property int $ingreso
 * @property int $salida
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

   
}
