@extends ('layouts.plantilla')
@section("contenido")

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de usuarios <a href="/parqueadero/propietarios/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('layouts.propietarios.search')
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Opciones</th>
                </thead>
            @foreach($propietarios as $p)
            <tr>
                <td>{{$p->id_propietario}}</td>
                <td>{{$p->nombre}}</td>
                <td>{{$p->apellido}}</td>
                <td>{{$p->cedula}}</td>
                <td>{{$p->correo}}</td>
                <td>{{$p->celular}}</td>
                <td>
                    <a href="{{URL::action('App\Http\Controllers\PropietariosController@edit',$p->id_propietario)}}"><button class="btn btn-info">Editar</button></a>
                    <!-- data-target permite llamar al id del modal de la vista creado, el formulario de eliminar  -->
                    <!-- <a href="" data-target="#modal-delete-{{$p->id_propietario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>                     -->
                </td>
            </tr>
            
            @endforeach
            </table>
        </div>
        <!-- Render permite paginar  -->
        {{$propietarios->render()}}
    </div>
@endsection