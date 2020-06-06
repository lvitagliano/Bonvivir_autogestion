<?php

namespace App\Models\Talento;

use Illuminate\Database\Eloquent\Model;

class CandidatoHobbies extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidato_hobbies';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['hobbie1_id', 'hobbie2_id', 'hobbie3_id', 'usuario_id'];

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


    public function Hobbie1()
    {
            return $this->hasOne('App\Models\Nomencladores\NomHobbies', 'id', 'hobbie1_id')->withDefault([
            'nombre' => 'Hobbie principal','id' => 0
        ]);
    }

    public function Hobbie2()
    {
            return $this->hasOne('App\Models\Nomencladores\NomHobbies', 'id', 'hobbie2_id')->withDefault([
            'nombre' => 'Hobbie secundario','id' => 0
        ]);
    }

    public function Hobbie3()
    {
            return $this->hasOne('App\Models\Nomencladores\NomHobbies', 'id', 'hobbie3_id')->withDefault([
            'nombre' => 'Hobbie terciario','id' => 0
        ]);
    }


    public function Usuario()
    {
        return $this->belongsTo('App\Models\Users', 'id', 'usuario_id');
    }


}
