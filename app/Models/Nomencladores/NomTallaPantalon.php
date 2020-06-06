<?php

namespace App\Models\Nomencladores;

use Illuminate\Database\Eloquent\Model;
use App\Models\Talento\CandidatoTallas;
class NomTallaPantalon extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nom_talla_pantalon';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'updated_at', 'create_at'];

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
    protected $dates = ['updated_at', 'create_at'];

    
    public function UsuariosPantalon()
    {
        return $this->hasMany(CandidatoTallas::class);
    }

}
