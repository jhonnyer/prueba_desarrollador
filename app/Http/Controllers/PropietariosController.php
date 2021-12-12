<?php

namespace App\Http\Controllers;
use App\Http\Requests\PropietarioFormRequest;
use Illuminate\Http\Request;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Redirect;
use DB;

class PropietariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            // texto de busqueda para filtrar todas las categorias 
            // query variable que almacena el dato o campo que se quiere filtrar 
            $query=trim($request->get('searchText'));
            // Muestra las categorias cuyas condicion es igual a 1 en la base de datos 
            // la tabla articulo se le pone el alias a para filtrar los datos y relacionar con otra tabla 
            $propietarios=DB::table('propietarios as p')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('id_propietario','desc')
            ->paginate(7);
            return view('layouts.propietarios.index',["propietarios"=>$propietarios,"searchText"=>$query]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.propietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropietarioFormRequest $request)
    {
        $propietario=new Propietario;
        $propietario->nombre=$request->nombre;
        $propietario->apellido=$request->apellido;
        $propietario->cedula=$request->cedula;
        $propietario->correo=$request->correo;
        $propietario->celular=$request->celular;
        $propietario->save();
        return Redirect::to('parqueadero/propietarios/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("layouts.propietarios.show",["propietarios"=>Propietario::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Recibe un parametro id para poder seleccionar un articulo en especifico 
        $propietarios=Propietario::findOrFail($id);
        return view("layouts.propietarios.edit",["propietarios"=>$propietarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropietarioFormRequest $request, $id)
    {
        $propietarios=Propietario::FindOrFail($id);
        $propietarios->nombre=$request->get('nombre');
        $propietarios->apellido=$request->get('apellido');
        $propietarios->cedula=$request->get('cedula');
        $propietarios->correo=$request->get('correo');
        $propietarios->celular=$request->get('celular');
        $propietarios->update();
        return Redirect::to('parqueadero/propietarios/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propietarios=Propietario::findOrFail($id);
        // Cuando se eliminar un producto en categoria cambia la condicion de activo a inactivo y en el index no se muestra 
        $propietarios->update();
        return Redirect::to('parqueadero/propietarios/');
    }
    //
}
