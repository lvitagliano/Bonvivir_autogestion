<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoOficios extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_oficios';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['oficio1_id', 'oficio2_id', 'oficio3_id', 'usuario_id'];

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

    public function Oficio1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomOficios', 'id', 'oficio1_id')->withDefault([
            'nombre' => 'Oficio principal','id' => 0
        ]);
    }

    public function Oficio2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomOficios', 'id', 'oficio2_id')->withDefault([
            'nombre' => 'Oficio secundario','id' => 0
        ]);
    }

    public function Oficio3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomOficios', 'id', 'oficio3_id')->withDefault([
            'nombre' => 'Oficio terciario','id' => 0
        ]);
    }


    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }



}
