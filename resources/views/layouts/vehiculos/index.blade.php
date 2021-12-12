@extends('layouts.plantilla')
@section('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de vehiculos <a href="/parqueadero/vehiculos/create"><button class="btn btn-success">Nuevo</button></a></h3>
            <p>Puedes realizar la busqueda de un vehiculo por marca, placa, nombre del propietario o el número de cedula del propietario</p>
            @include('layouts.vehiculos.search')
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Tipo de Vehiculo</th>
                    <th>Propietario</th>
                    <th>C.c Propietario</th>
                    <th>Estado</th>
                    <td>Opciones</td>
                </thead>
            @foreach($vehiculos as $v)
            <tr>
                <td>{{$v->id_vehiculo}}</td>
                <td>{{$v->placa}}</td>
                <td>{{ucfirst($v->marca)}}</td>
                <td>{{$v->tipo_vehiculo}}</td>
                <td>{{$v->nombre}}</td>
                <td>{{$v->cedula}}</td>
                <td>{{$v->estado}}</td>
                <td>
                    <a href="{{URL::action('App\Http\Controllers\VehiculosController@edit',$v->id_vehiculo)}}"><button class="btn btn-info">Editar</button></a>
                    <!-- data-target permite llamar al id del modal de la vista creado, el formulario de eliminar  -->
                    <!-- <a href="" data-target="#modal-delete-{{$v->id_vehiculo}}" data-toggle="modal"><button class="btn btn-danger">Ocupar</button></a>                     -->
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        <!-- Render permite paginar  -->
        {{$vehiculos->render()}}
        <h3><a href="/parqueadero/cons_vehiculos/"><button class="btn btn-success">Listado de vehiculos por marca</button></a></h3>
    </div>
@stop