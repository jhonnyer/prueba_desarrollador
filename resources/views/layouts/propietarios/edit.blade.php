@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Editar información del propietario:   <strong>{{$propietarios->nombre}}</strong></h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
            <!-- Envia metodo PATCH para actualizar, la ruta de update del controlador y el parametro IDcategoria  -->
            {!!Form::model($propietarios,['method'=>'PATCH','action'=>['App\Http\Controllers\PropietariosController@update',$propietarios->id_propietario],'files'=>'true'])!!}
            {{Form::token()}}            
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <!-- {!!Form::text('nombre')!!} -->
                    <!-- {!!Form::label('nombre','Nombre',['class'=>'form-control'])!!} -->
                    <label for="nombre">Nombre</label>
                    <!-- name="nombre" es el objeto recibido en la categoria  -->
                    <!-- Si el nombre no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="nombre" required value="{{$propietarios->nombre}}" class="form-control" placeholder="Nombre..."></input>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <!-- name="codigo" es el objeto recibido en la categoria  -->
                    <!-- Si el codigo no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="apellido" required value="{{$propietarios->apellido}}"  class="form-control" placeholder="Apellidos..."></input>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <label for="cedula">C.c del propietario</label>
                    <!-- name="codigo" es el objeto recibido en la categoria  -->
                    <!-- Si el codigo no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="cedula" required value="{{$propietarios->cedula}}"  class="form-control" placeholder="Cedula..."></input>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <label for="celular">Celular</label>
                    <!-- name="codigo" es el objeto recibido en la categoria  -->
                    <!-- Si el codigo no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="celular" required value="{{$propietarios->celular}}"  class="form-control" placeholder="Celular..."></input>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <label for="correo">Correo</label>
                    <!-- name="codigo" es el objeto recibido en la categoria  -->
                    <!-- Si el codigo no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="correo" required value="{{$propietarios->correo}}"  class="form-control" placeholder="Correo..."></input>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>            
            {!!Form::close()!!}
@endsection