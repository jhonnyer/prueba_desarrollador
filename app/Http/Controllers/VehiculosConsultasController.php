<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Vehiculo;
use App\Models\Propietario;
use Illuminate\Support\Facades\Redirect;

use DB;

class VehiculosConsultasController extends Controller
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
            $vehiculos=DB::table('vehiculos as v')
            // Relacion con la tabla categoria mediante JOIN 
            // la tabla a.idarticulo se va a unir con la tabla c.idcategoria. Utilizacion llaves foraneas
            ->select('v.id_vehiculo','v.placa','v.marca')
            // Filtrar por el nombre del articulo, el nombre contenga la cadena del nombre a buscar en el index 
            ->where('v.marca','LIKE','%'.$query.'%')
            ->orwhere('v.placa','LIKE','%'.$query.'%')
            ->orderBy('id_vehiculo','asc')
            ->paginate(7);

            // Consulta conteo por marcas 
            $count_vehiculo = DB::table('vehiculos')
            // ->select('marca')
            // ->groupBy('marca')
            // ->distinct('marca')
            // ->count('*');
            ->select(DB::raw("COUNT(*) as marca"))
            ->orderBy("marca")
            ->groupBy("marca")
            ->get();
            print_r($count_vehiculo);
            return view('layouts.vehiculos.list_vehiculos',["vehiculos"=>$vehiculos,"searchText"=>$query,'count_vehiculo'=>$count_vehiculo]);
        }
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
        //
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
