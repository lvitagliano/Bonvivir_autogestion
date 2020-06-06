<?php

namespace App\Models\Nomencladores;

use Illuminate\Database\Eloquent\Model;
use App\Models\Talento\CandidatoTalentos;
class NomTalentosCategoria extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nom_talentos_categoria';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'genero_id', 'created_at', 'updated_at', 'talento_id'];

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

    
    public function UsuariosTalentoCategoria()
    {
        return $this->hasMany(CandidatoTalentos::class);
    }
}
