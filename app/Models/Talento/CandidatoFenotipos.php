<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoFenotipos extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_fenotipos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color_cabello_id', 'color_ojos_id', 'contextura_id', 'etnias_id', 'look_id', 'tatuaje_id', 'tono_piel_id', 'usuario_id'];

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

     public function ColorCabello()
    {
            return $this->hasOne('App\Models\Nomencladores\NomColorCabello', 'id', 'color_cabello_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

     public function ColorOjos()
    {
            return $this->hasOne('App\Models\Nomencladores\NomColorOjos', 'id', 'color_ojos_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

     public function Contextura()
    {
            return $this->hasOne('App\Models\Nomencladores\NomContextura', 'id', 'contextura_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

     public function Etnia()
    {
            return $this->hasOne('App\Models\Nomencladores\NomEtnias', 'id', 'etnias_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

     public function Look()
    {
            return $this->hasOne('App\Models\Nomencladores\NomLooks', 'id', 'look_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

     public function TonoPiel()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTonoPiel', 'id', 'tono_piel_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }

}
