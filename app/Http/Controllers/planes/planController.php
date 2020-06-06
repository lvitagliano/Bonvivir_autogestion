<?php

namespace App\Http\Controllers\planes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Plan_configurable;
use App\Models\Admin\Pago_planes;
use App\Models\Nomencladores\RolesTipos;
use App\Models\Industria\IndustriaDatos;
use App\Models\Users;

class planController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $usuario = Users::find(auth()->id())
        ->leftJoin('industria_datos', 'users.id', '=', 'industria_datos.usuario_id')
        ->select(['users.*', 'industria_datos.tipo_rol_id as rol'])
        ->first();
        $rolUser = RolesTipos::where('id', $usuario['rol'])->first();
        $planes = plan_configurable::where('Tipo_industria_id', $usuario['rol'])
        ->where('Activo', 1)
        ->first();

        return compact('usuario', 'rolUser', 'planes'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentPlan = new Pago_planes();

        $currentPlan->talentos = 0;
        $currentPlan->invitados = 0;
        $currentPlan->monto = 0;
        $currentPlan->id_plan = 1;
        $currentPlan->tipo_pago = 'Asistente';
        $currentPlan->Activado = 1;
        $currentPlan->activo = 1;
        $currentPlan->id_usuario = auth()->id();
        $currentPlan->save();

        return $currentPlan;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 
    
}
