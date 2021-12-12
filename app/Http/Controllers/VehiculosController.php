<?php

namespace App\Http\Controllers;
use App\Http\Requests\VehiculoFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Vehiculo;
use App\Models\Propietario;
use Illuminate\Support\Facades\Redirect;
// Subir imagenes desde el host utilizado por el cliente 
// Artchivo input no sirve, se utiliza el request para subir imagenes 
// use Illuminate\Support\Facades\Input;
// Archivo request restricciones modelo 
use App\Http\Requests\ArticuloFormRequest;
use DB;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // Se gestione el acceso por usuario 
        // $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request){
            // texto de busqueda para filtrar todas las categorias 
            // query variable que almacena el dato o campo que se quiere filtrar 
            $query=trim($request->get('searchText'));
            // Muestra las categorias cuyas condicion es igual a 1 en la base de datos 
            // la tabla articulo se le pone el alias a para filtrar los datos y relacionar con otra tabla 
            $vehiculos=DB::table('vehiculos as v')
            // Relacion con la tabla categoria mediante JOIN 
            // la tabla a.idarticulo se va a unir con la tabla c.idcategoria. Utilizacion llaves foraneas
            ->join('propietarios as p','v.id_propietario1','=','p.id_propietario')
            // c.nombre as categoria se renombra el campo nombre por categoria 
            ->select('v.id_vehiculo','v.placa','v.marca','v.tipo_vehiculo','p.nombre as nombre', 'p.cedula as cedula','v.estado')
            // Filtrar por el nombre del articulo, el nombre contenga la cadena del nombre a buscar en el index 
            ->where('v.placa','LIKE','%'.$query.'%')
            // Filtra por codigo. Dos filtros utilizados 
            ->orwhere('v.marca','LIKE','%'.$query.'%')
            ->orwhere('p.cedula','LIKE','%'.$query.'%')
            ->orwhere('p.nombre','LIKE','%'.$query.'%')
            ->orderBy('id_vehiculo','desc')
            ->paginate(7);
            return view('layouts.vehiculos.index',["vehiculos"=>$vehiculos,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Seleccionar todos los propietarios donde la condicion sea igual a 1, no se hayan eliminado 
        // $propietarios=DB::table('propietarios');
        // $propietarios = $propietarios->get();
        // $propietarios=DB::SELECT("SELECT * FROM propietarios");
        $propietarios=Propietario::all();
        // volvemos a la vista vehiculos/create y se envian todos los datos almacenados en categorias 
        return view("layouts.vehiculos.create",["propietarios"=>$propietarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculoFormRequest $request)
    {
        $vehiculos=new Vehiculo;
        $vehiculos->id_propietario1=$request->get('id_propietario1');
        $vehiculos->placa=$request->get('placa');
        $vehiculos->marca=$request->get('marca');
        $vehiculos->tipo_vehiculo=$request->get('tipo_vehiculo');
        $vehiculos->estado='Ocupado';
        $vehiculos->save();

        return Redirect::to('parqueadero/vehiculos/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Redirect::to('parqueadero/vehiculos/');
        return view("layouts.vehiculos.show",["vehiculos"=>Vehiculo::findOrFail($id)]);
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
        $vehiculos=Vehiculo::findOrFail($id);
        // Filtrar las categorias por la condiccion 1, las que esten activas 
        $propietarios=DB::table('propietarios')->get();
        return view("layouts.vehiculos.edit",["vehiculos"=>$vehiculos,"propietarios"=>$propietarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculoFormRequest $request, $id)
    {
        $vehiculos=Vehiculo::FindOrFail($id);
        $vehiculos->id_propietario1=$request->get('id_propietario1');
        $vehiculos->placa=$request->get('placa');
        $vehiculos->marca=$request->get('marca');
        $vehiculos->tipo_vehiculo=$request->get('tipo_vehiculo');
        $vehiculos->estado=$request->get('estado');
        $vehiculos->update();
        return Redirect::to('parqueadero/vehiculos/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculos=Vehiculo::findOrFail($id);
        // Cuando se eliminar un producto en categoria cambia la condicion de activo a inactivo y en el index no se muestra 
        $vehiculos->estado='Libre';
        $vehiculos->update();
        return Redirect::to('parqueadero/vehiculos/');
    }
    //
}



