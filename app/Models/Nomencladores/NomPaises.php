<?php

namespace App\Models\Nomencladores;

use Illuminate\Database\Eloquent\Model;

class NomPaises extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nom_paises';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'codigo_pais', 'created_at', 'updated_at', 'iso2', 'area_code'];

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

    
    public function UsuarioPais()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'pais_id');
    }


}
