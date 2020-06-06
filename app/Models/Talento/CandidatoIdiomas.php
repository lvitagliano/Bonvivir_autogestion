<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoIdiomas extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_idiomas';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idioma1_id', 'idioma2_id', 'idioma3_id', 'usuario_id'];

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

    public function Idioma1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomIdiomas', 'id', 'idioma1_id')->withDefault([
            'nombre' => 'Idioma nativo','id' => 0
        ]);
    }

    public function Idioma2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomIdiomas', 'id', 'idioma2_id')->withDefault([
            'nombre' => 'Idioma secundario','id' => 0
        ]);
    }

    public function Idioma3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomIdiomas', 'id', 'idioma3_id')->withDefault([
            'nombre' => 'Idioma terciario','id' => 0
        ]);
    }

    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }


}
