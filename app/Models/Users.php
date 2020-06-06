<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model  
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['termino_accept', 'nombre', 'name', 'nombre_artistico', 'email', 'password', 'avatar', 'perfil', 'codigo_area', 'telefono', 'sexo_id', 'dia', 
    'mes', 'anio', 'pais_id', 'provincia_id', 'ciudad_id', 'wizzardToken', 'acercademi', 'created_at', 'updated_at', 'nacionalidad_id', 'email2', 'experiencia', 'tutorial', 
    'authy_id', 'verificado', 'disponibilidad', 'activo','slogan', 'provider', 'provider_id','codigo_area2','telefono2','codigo_promocional','codigo_referido','manager_id',
    'representante_id'];

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


    public function Tallas()
    {
        return $this->hasOne('App\Models\Talento\CandidatoTallas', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Camisa','id' => 0
    ]);
    }

    public function Fenotipos()
    {
        return $this->hasOne('App\Models\Talento\CandidatoFenotipos', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Tono de Piel','id' => 0
    ]);
    }

    public function Idiomas()
    {
        return $this->hasOne('App\Models\Talento\CandidatoIdiomas', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Idioma nativo','id' => 0
    ]);
    }   

    public function Nacionalidad()
    {
        return $this->hasOne('App\Models\Nomencladores\NomNacionalidades', 'gentilicio_nac', 'nacionalidad_id')->withDefault([
        'gentilicio_nac' => 'Nacionalidad'
    ]);
    }

    public function Ciudad()
    {
        return $this->hasOne('App\Models\Nomencladores\NomCiudades', 'id', 'ciudad_id')->withDefault([
        'nombre' => 'Ciudad','id' => 0
    ]);
    }

    public function Pais()
    {
        return $this->hasOne('App\Models\Nomencladores\NomPaises', 'id', 'pais_id')->withDefault([
        'nombre' => 'País de residencia','id' => 0
    ]);
    }  

    public function Provincia()
    {
        return $this->hasOne('App\Models\Nomencladores\NomProvincias', 'id', 'provincia_id')->withDefault([
        'nombre' => 'Provincia','id' => 0
    ]);
    }
    
    public function Sexual()
    {
        return $this->hasOne('App\Models\Nomencladores\NomSexo', 'id', 'sexo_id')->withDefault([
        'nombre' => 'Género ','id' => 0
    ]);
    }

    

    public function Talentos()
    {
        return $this->hasOne('App\Models\Talento\CandidatoTalentos', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Talento principal','id' => 0
    ]);
    }

    public function Hobbies()
    {
        return $this->hasOne('App\Models\Talento\CandidatoHobbies', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Sin hobbie ','id' => 0
    ]);
    }

    public function Oficios()
    {
        return $this->hasOne('App\Models\Talento\CandidatoOficios', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Sin oficio ','id' => 0
    ]);
    }

    public function Habilidades()
    {
        return $this->hasOne('App\Models\Talento\CandidatoTalentosHabilidades', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Sin otra fortaleza','id' => 0
    ]);
    }

    public function Social()
    {
        return $this->hasOne('App\Models\Talento\CandidatoSocial', 'usuario_id', 'id')->withDefault([
        'nombre' => 'Sin red social','id' => 0
    ]);
    }

    public function Manager()
    {
        return $this->hasOne('App\Models\Users', 'id', 'manager_id')->withDefault([
        'nombre' => 'Sin manager','id' => 0
    ]);
    }

    public function Representante()
    {
        return $this->hasOne('App\Models\Users', 'id', 'representante_id')->withDefault([
        'nombre' => 'Sin representante','id' => 0
    ]);
    }

    public function Industria()
    {
        return $this->hasOne('App\Models\Industria\IndustriaDatos', 'usuario_id', 'id')->withDefault([
        'nombre' => '','id' => 0
    ]);
    }


    public function Castings()
    {
        return $this->hasOne('App\Models\Castings\Castings', 'usuario_id', 'id')->withDefault([
        'nombre' => '','id' => 0
    ]);
    }


     /* Relaciones 1 a muchos */

    public function Educacion()
    {
        return $this->hasMany('App\Models\Talento\CandidatoEducacion', 'usuario_id', 'id');
    }

    public function Experiencias()
    {
        return $this->hasMany('App\Models\Talento\CandidatoExperiencias', 'usuario_id', 'id');
    }

    public function Reconocimientos()
    {
        return $this->hasMany('App\Models\Talento\CandidatoReconocimientos', 'usuario_id', 'id');
    }

    public function Videos()
    {
        return $this->hasMany('App\Models\Talento\CandidatoVideos', 'usuario_id', 'id');
    }

    public function Audios()
    {
        return $this->hasMany('App\Models\Talento\CandidatoAudios', 'usuario_id', 'id');
    }
    
     public function Fotos()
    {
        return $this->hasMany('App\Models\Talento\CandidatoFotos', 'usuario_id', 'id');
    }

    public function Talentos_deseos()
    {
        return $this->hasMany('App\Models\Talento\CandidatosDeseados', 'industria_id', 'id');
    }

    public function Talentos_adquiridos()
    {
        return $this->hasMany('App\Models\Talento\CandidatosAdquiridos', 'industria_id', 'id');
    }

    public function Talentos_Representados_Manager()
    {
        return $this->hasMany('App\Models\Users', 'manager_id', 'id');
    }

    public function Talentos_Representados_Representante()
    {
        return $this->hasMany('App\Models\Users', 'representante_id', 'id');
    }

    public function Talento_en_Proyecto()
    {
        return $this->hasMany('App\Models\Castings\CastingsSeleccionados', 'talento_id', 'id');
    }


}
