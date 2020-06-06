<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoVideos extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_videos';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_fisico', 'updated_at', 'created_at', 'usuario_id', 'nombre', 'mes', 'anio', 'thumb'];

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


    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }

}
