<?php

namespace App\Models\Castings;

use Illuminate\Database\Eloquent\Model;

class Castings extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'castings';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proyecto_id', 'nombre', 'usuario_id', 'empresa', 'lugar', 'direccion', 'horario', 'tiempo', 'observaciones', 'fecha_inicio', 'fecha_fin', 
    'casting_desde', 'casting_hasta', 'grabacion_desde', 'grabacion_hasta', 'updated_at', 'created_at', 
    'imagen', 'caducidad_derechos', 'derechos_medios', 'presupuesto','fecha_pago','cantidad_talentos','descripcion','msj_status','tipo_casting','uid','solicito_disponibilidad','seleccion_finalizada','marca'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];



    public function Seleccionados()
    {
        return $this->hasMany('App\Models\Castings\CastingsSeleccionados', 'casting_id', 'id');
    }

    public function Aceptados()
    {
        return $this->hasMany('App\Models\Castings\CastingsSeleccionados', 'casting_id', 'id')->where('confirmado', '=', '1');;
    }

    public function Rechazados()
    {
        return $this->hasMany('App\Models\Castings\CastingsSeleccionados', 'casting_id', 'id')->where('confirmado', '=', '-1');;
    }

    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users');
    }
    
    public function MensajesNoLeidos()
    {
        return $this->hasMany('App\Models\Chats', 'casting_id', 'id')->where('visto', 0);
    }

    public function MensajesNoReceptor()
    {
        return $this->hasMany('App\Models\Chats', 'casting_id', 'id')->where('chats.receptor_id','castings.usuario_id')->where('visto', 0);
    }
}
