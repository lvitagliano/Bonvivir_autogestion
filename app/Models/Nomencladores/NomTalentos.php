<?php

namespace App\Models\Nomencladores;

use Illuminate\Database\Eloquent\Model;
use App\Models\Talento\CandidatoTalentos;
use Spatie\Translatable\HasTranslations;

class NomTalentos extends Model  
{
    use HasTranslations;
    
    public $translatable = ['traduccion'];
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nom_talentos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','traduccion', 'created_at', 'updated_at'];

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


    public function UsuariosTalentos()
    {
        return $this->hasMany(CandidatoTalentos::class);
    }

}
