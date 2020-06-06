<?php

namespace App\Models\Nomencladores;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
class NomNacionalidades extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nom_nacionalidades';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pais_nac', 'gentilicio_nac', 'iso_nac'];

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

    public function UsuarioNacionalidad()
    {
        return $this->belongsTo('App\Models\Users', 'nacionalidad_id', 'gentilicio_nac');
    }

}
