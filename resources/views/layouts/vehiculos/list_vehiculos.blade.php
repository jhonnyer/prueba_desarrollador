@extends('layouts.plantilla')
@section('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de vehiculos <a href="/parqueadero/vehiculos/create"><button class="btn btn-success">Nuevo</button></a></h3>
            <p>Puedes realizar la busqueda de un vehiculo por marca o por placa</p>
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
                </thead>
            @foreach($vehiculos as $v)
            <tr>
                <td>{{$v->id_vehiculo}}</td>
                <td>{{$v->placa}}</td>
                <td>{{ucfirst($v->marca)}}</td>
                <td>
                    <a href="{{URL::action('App\Http\Controllers\VehiculosController@edit',$v->id_vehiculo)}}"><button class="btn btn-info">Editar</button></a>
                    <!-- data-target permite llamar al id del modal de la vista creado, el formulario de eliminar  -->
                </td>
            </tr>
            @endforeach
            </table>
        </div>

        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Marca</th>
                    <th>Conteo</th>
                </thead>
            @foreach($vehiculos as $v)
            <tr>
                <td>{{$v->marca}}</td>
                <td>{{$count_vehiculo}}</td>
            </tr>
            @endforeach
            </table>
        </div>
        <!-- Render permite paginar  -->
        {{$vehiculos->render()}}
        <h3>Volver al menu de <a href="/parqueadero/vehiculos/">inicio</a></h3>
    </div>
@stop