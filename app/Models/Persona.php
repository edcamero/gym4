<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $documento
 * @property string $nombre
 * @property string $apellido
 * @property date $fecha_nac
 * @property string $sexo
 * @property string $telefono
 * @property string $direccion
 * @property int $altura
 * @property string $foto
 * @property int $user_id
 * @property User $user
 */
class Persona extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table =  'persona';
   // */ public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['documento', 'nombre', 'apellido', 'fecha_nac', 'sexo', 'telefono', 'direccion', 'altura', 'foto', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    


    public function user()
    {
                return $this->belongsTo('App\Models\User', 'user_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   
}
