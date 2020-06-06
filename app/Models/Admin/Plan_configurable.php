<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Plan_configurable extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plan_configurable';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['MontoUnidad', 'Descuento', 'Proporcion1', 'Corte1', 'Proporcion2', 'Corte2',
     'Proporcion3', 'Corte3', 'Proporcion4', 'Corte4', 'Proporcion5', 'Corte5','Pais_id', 'created_at', 
     'updated_at','Activo', 'Tipo_industria_id', 'Tipo_fiscal_id', 'Industria_id', 'Baja_fecha', 'User_create_id'];

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

    public function Pais()
    {
        return $this->hasOne('App\Models\Nomencladores\NomPaises', 'id', 'Pais_id')->withDefault([
        'nombre' => 'País Configurado','id' => 0
    ]);
    } 
}
