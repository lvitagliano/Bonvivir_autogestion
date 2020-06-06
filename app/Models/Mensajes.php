<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mensajes extends Model  
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mensajes';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['emisor_id', 'receptor_id', 'numero_recibido', 'mensaje', 'status', 'casting_seleccionado_id', 
    'casting_id', 'visto'];
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
   
    public function Castings()
    {
        return $this->hasOne('App\Models\Castings\Castings', 'casting_id', 'id')->withDefault([
        'nombre' => '','id' => 0
    ]);
    }
}