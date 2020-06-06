<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoFotos extends Model      
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_fotos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_foto', 'galeria', 'nombre_fisico', 'usuario_id', 'nombre', 'mes', 'updated_at', 'created_at', 'anio'];

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


    public function Usuarios()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }

}
