<?php

namespace App\Models\Industria;

use Illuminate\Database\Eloquent\Model;

class IndustriaDatos extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'industria_datos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sitio_web', 'email1', 'email2', 'razon_social', 'ruc', 'codigo_area1','codigo_area2','telefono1', 
    'pais_id','ciudad_id','provincia_id','telefono2', 'slogan', 'usuario_cargo', 'usuario_id','es_rif','es_ruc','es_cedula',
    'es_pasaporte','industria_tipo_id'];

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



    public function Ciudad()
    {
        return $this->hasOne('App\Models\Nomencladores\NomCiudades', 'id', 'ciudad_id')->withDefault([
        'nombre' => 'Ciudad','id' => 0
    ]);
    }

    public function Pais()
    {
        return $this->hasOne('App\Models\Nomencladores\NomPaises', 'id', 'pais_id')->withDefault([
        'nombre' => 'País de residencia','id' => 0
    ]);
    }  

    public function Provincia()
    {
        return $this->hasOne('App\Models\Nomencladores\NomProvincias', 'id', 'provincia_id')->withDefault([
        'nombre' => 'Provincia','id' => 0
    ]);
    }

    public function Tipo()
    {
        return $this->hasOne('App\Models\Nomencladores\NomIndustriaTipo', 'id', 'industria_tipo_id')->OrderBy('nombre','ASC')->withDefault([
        'nombre' => '','id' => 0
    ]);
    }


}
