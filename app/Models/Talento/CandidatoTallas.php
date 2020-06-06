<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoTallas extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_tallas';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['altura', 'tipo_altura_id', 'busto', 'tipo_busto_id', 'cadera', 'tipo_cadera_id', 'camisa_id', 'tipo_camisa_id', 'cintura', 'tipo_cintura_id', 'pantalon_id', 'tipo_pantalon_id', 'zapatos_id', 'tipo_zapatos_id', 'usuario_id'];

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


    public function TipoAltura()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTipoTallas', 'id', 'tipo_altura_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

    public function TipoBusto()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTipoTallas', 'id', 'tipo_busto_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

    public function TipoCadera()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTipoTallas', 'id', 'tipo_cadera_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }

    public function TipoCintura()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTipoTallas', 'id', 'tipo_cintura_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }




    public function Camisa()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTallaCamisa', 'id', 'camisa_id')->withDefault([
            'nombre' => 'Camisa','id' => 0
        ]);
    }

    public function TipoCamisa()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTipoTallas', 'id', 'tipo_camisa_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }


    public function Pantalon()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTallaPantalon', 'id', 'pantalon_id')->withDefault([
            'nombre' => 'Pantalon','id' => 0
        ]);
    }

    public function TipoPantalon()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTipoTallas', 'id', 'tipo_pantalon_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }


    public function Zapato()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTallaZapatos', 'id', 'zapatos_id')->withDefault([
            'nombre' => 'Zapato','id' => 0
        ]);
    }

    public function TipoZapato()
    {
            return $this->hasOne('App\Models\Nomencladores\NomTipoTallas', 'id', 'tipo_zapatos_id')->withDefault([
            'nombre' => '--','id' => 0
        ]);
    }


    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }
}
