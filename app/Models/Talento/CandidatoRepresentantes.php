<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoRepresentantes extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_representantes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'parentesco', 'pais_id', 'ciudad_id', 'provincia_id', 'email', 'telefono', 'created_at', 'updated_at', 'area_code','usuario_id'];

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


    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }

}
