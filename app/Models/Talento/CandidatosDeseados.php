<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatosDeseados extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidatos_deseados';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['talento_id', 'industria_id', 'desde', 'hasta'];

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
    protected $dates = ['desde', 'hasta'];
    public $timestamps = false;

    public function Usuarios()
    {
        return $this->belongsTo('App\Models\Users', 'usuario_id', 'id');
    }

    public function Usuario()
    {
        return $this->hasOne('App\Models\Users', 'id', 'usuario_id');
    }

    
}
