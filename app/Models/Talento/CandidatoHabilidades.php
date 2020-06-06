<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoHabilidades extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_habilidades';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['habilidad1_id', 'habilidad2_id', 'habilidad3_id', 'usuario_id'];

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

    public function Habilidad1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomHabilidades', 'id', 'habilidad1_id')->withDefault([
            'nombre' => 'Habilidad principal','id' => 0
        ]);
    }

    public function Habilidad2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomHabilidades', 'id', 'habilidad2_id')->withDefault([
            'nombre' => 'Habilidad secundaria','id' => 0
        ]);
    }

    public function Habilidad3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomHabilidades', 'id', 'habilidad3_id')->withDefault([
            'nombre' => 'Habilidad terciaria','id' => 0
        ]);
    }
    
    
    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }

}
