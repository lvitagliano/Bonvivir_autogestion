<?php

namespace App\Models\Nomencladores;

use Illuminate\Database\Eloquent\Model;
use App\Models\Talento\CandidatoTalentos;

class NomTalentosEspecialidad extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nom_talentos_especialidad';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'categoria_id', 'updated_at', 'created_at'];

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
    protected $dates = ['updated_at', 'created_at'];


    public function UsuariosTalentoEspecialidad()
    {
        return $this->hasMany(CandidatoTalentos::class);
    }

}
