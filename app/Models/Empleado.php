<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
/**
 * @property int $id
 * @property int $tip_emp_id
 * @property int $per_id
 * @property Persona $persona
 * @property TipoEmpleado $tipoEmpleado
 * @property EvaluacionEmple[] $evaluacionEmples
 * @property Horarios[] $horarios
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
        return $this->hasOne('App\Models\Persona','id','per_id');
    }

    public function tipoEmpleado()
    {
        return $this->hasOne('App\Models\TipoEmpleado','id','tip_emp_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    /*
    public function tipoEmpleado()
    {
        return $this->belongsTo('App\TipoEmpleado', 'tipo_emple_id');
    }
    */

    
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
    public function horarios()
    {
        //return $this->hasMany('App\Horarioasignado', 'emp_id', 'id');
        return $this->belongsToMany('App\Models\Horario','empleado_horarios','id_emp','id_hor')
        ->withPivot('id_hor','dia');
    }


    public function AgregarHorario($id_horario,$dia){
       // $date = new \DateTime();   
       
        //$horario=App\Models\Horario::find($id_horario);
        $this->horarios()->attach($id_horario,['dia'=>$dia,'created_at'=>Carbon::now()->format('Y-m-d'),'updated_at'=>Carbon::now()->format('Y-m-d')]);
    }


    public function AgregarHorarios($vectorHorarios,$dia){
        $dia2=strtotime($dia);
         $fecha_actua=Carbon::now();
         $vectorColum = array_fill(0, count($vectorHorarios), ['dia'=>$dia,'id_emp'=>$this->id,'created_at'=>$fecha_actua,'updated_at'=>$fecha_actua->toDateString()]);
         $vectorFinal=array_combine($vectorHorarios,$vectorColum);
         return $this->horarios()->updateExistingPivot($vectorFinal);
        
         }
        

         public function AgregarHorarios2($vectorHorarios,$dia){

            DB::table('empleado_horarios')->where('id_emp',$this->id)
            ->where('dia',$dia)->delete();

                foreach($vectorHorarios as $id_horario){
                    
                    $this->horarios()->attach($id_horario,['dia'=>$dia,'created_at'=>Carbon::now()->format('Y-m-d'),'updated_at'=>Carbon::now()->format('Y-m-d')]);
                }
             }
            
             
             
            
             
         
        
    }

