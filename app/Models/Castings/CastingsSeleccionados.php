<?php

namespace App\Models\Castings;

use Illuminate\Database\Eloquent\Model;

class CastingsSeleccionados extends Model  
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'castings_seleccionados';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['casting_id', 'talento_id', 'industria_id', 'manager_id', 'representante_id', 'mail_enviado', 'created_at', 'updated_at',
     'confirmado', 'uid','presupuesto', 'porcentaje','msj_status','favorito','check'];

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
    protected $dates = ['created_at', 'updated_at'];



    public function Talentos()
    {
        return $this->hasOne('App\Models\Users', 'id', 'talento_id');
    }

    public function Casting()
    {
        return $this->belongsTo('App\Models\Castings\Castings');
    }

    public function MensajesTalento()
    {
        return $this->hasMany('App\Models\Chats', 'casting_id', 'casting_id')
        ->where(function ($query){
            $query->where('chats.emisor_id', 'castings_seleccionados.talento_id') 
                  ->orwhere('chats.receptor_id', 'castings_seleccionados.talento_id');
        });
        
    }

    public function MensajesIndustria()
    {
        return $this->hasMany('App\Models\Chats', 'casting_id', 'casting_id')
        ->where(function ($query){
            $query->where('chats.emisor_id', 'castings_seleccionados.industria_id') 
                  ->orwhere('chats.receptor_id', 'castings_seleccionados.industria_id');
        });
    }

    public function MensajesNoLeidos()
    {
        return $this->hasMany('App\Models\Chats', 'casting_id', 'casting_id')->where('visto', 0);
    }

    public function MensajesNoLeidosIndustria()
    {
        return $this->hasMany('App\Models\Chats', 'casting_id', 'casting_id')
        ->where(function ($query){
            $query->where('chats.emisor_id', 'castings_seleccionados.industria_id')->where('visto', 0) 
                  ->orwhere('chats.receptor_id', 'castings_seleccionados.industria_id')->where('visto', 0);
        });;
    }


}
