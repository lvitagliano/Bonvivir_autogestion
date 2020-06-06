<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoTalentos extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_talentos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['talento1_id', 'genero1_id', 'categoria1_id', 'especialidad1_id', 'talento2_id', 'genero2_id', 'categoria2_id', 'especialidad2_id', 'talento3_id', 'genero3_id', 'categoria3_id', 'especialidad3_id', 'usuario_id'];

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



    public function Talento1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'talento1_id')->withDefault([
            'nombre' => 'Talento principal','id' => 0
        ]);
    }

    public function Talento2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'talento2_id')->withDefault([
            'nombre' => 'Talento secundario','id' => 0
        ]);
    }

    public function Talento3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'talento3_id')->withDefault([
            'nombre' => 'Deporte','id' => 0
        ]);
    }


    public function Genero1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'genero1_id')->withDefault([
            'nombre' => 'Genero','id' => 0
        ]);
    }

    public function Genero2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'genero2_id')->withDefault([
            'nombre' => 'Genero','id' => 0
        ]);
    }

    public function Genero3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'genero3_id')->withDefault([
            'nombre' => 'Genero','id' => 0
        ]);
    }

    public function Categoria1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'categoria1_id')->withDefault([
            'nombre' => 'Categoria','id' => 0
        ]);
    }

    public function Categoria2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'categoria2_id')->withDefault([
            'nombre' => 'Categoria','id' => 0
        ]);
    }

    public function Categoria3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'categoria3_id')->withDefault([
            'nombre' => 'Categoria','id' => 0
        ]);
    }

    public function Especialidad1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'especialidad1_id')->withDefault([
            'nombre' => 'Especialidad','id' => 0
        ]);
    }

    public function Especialidad2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'especialidad2_id')->withDefault([
            'nombre' => 'Especialidad','id' => 0
        ]);
    }

    public function Especialidad3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTalentos', 'id', 'especialidad3_id')->withDefault([
            'nombre' => 'Especialidad','id' => 0
        ]);
    }


    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }

}
