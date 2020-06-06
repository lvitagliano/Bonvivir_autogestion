<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use \Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;

class Pago_planes extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plan_pago';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuario', 'id_plan', 'id_proyecto', 'talentos', 'invitados', 'monto', 'Activado', 'imagen_pago', 'tipo_pago', 'Activo'];


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

    public function Planes()
    {
       return $this->hasMany('App\Models\Admin\Planes', 'id', 'id_plan')->orderBy('id','DESC');
   }

   public function structures(){
    return $this->belongsToMany(Structure::class);
}

public function getRememberTokenName(){
    return '';
}
}
