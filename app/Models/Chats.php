<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Chats extends Model  
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chats';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['emisor_id', 'receptor_id', 'numero_recibido', 'mensaje', 'status', 'casting_seleccionado_id', 
    'casting_id', 'visto','revision'];
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
   
    public function Emisor()
    {
        return $this->hasOne('App\Models\Users', 'id', 'emisor_id');
    }

    public function Receptor()
    {
        return $this->hasOne('App\Models\Users', 'id', 'receptor_id');
    }
}