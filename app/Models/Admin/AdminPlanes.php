<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminPlanes extends Model  
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admin_planes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad_talentos', 'nombre', 'detalle', 'precio', 'descuento', 'cantidad_dias', 'favorito', 'actual', 'activo'];

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

    public function Items()
    {
        return $this->hasMany('App\Models\Admin\AdminItems', 'admin_plan_id', 'id');
    }


}
