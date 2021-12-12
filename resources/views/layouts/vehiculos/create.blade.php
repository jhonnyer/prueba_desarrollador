@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Nuevo Vehiculo</h3>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            @endif
            </div>
        </div>
    </div>
            <!-- Metodo POST llama a la funcion store  -->
            {!!Form::open(array('url'=>'parqueadero/vehiculos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <!-- LAs etiquetas se muestren en dos columnas  -->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <!-- {!!Form::text('nombre')!!} -->
                    <!-- {!!Form::label('nombre','Nombre',['class'=>'form-control'])!!} -->
                    <label for="placa">Placa</label>
                    <!-- name="nombre" es el objeto recibido en la categoria  -->
                    <!-- Si el nombre no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="placa" required value="{{old('placa')}}" class="form-control" placeholder="Placa..."></input>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Propietario</label>
                <select name="id_propietario1" class="form-control">
                    @foreach($propietarios as $p)
                        <option value="{{$p->id_propietario}}">{{$p->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <label for="marca">Marca</label>
                    <!-- name="codigo" es el objeto recibido en la categoria  -->
                    <!-- Si el codigo no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="marca" required value="{{old('marca')}}" class="form-control" placeholder="Marca del vehiculo..."></input>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                    <label for="tipo_vehiculo">Tipo Vehiculo</label>
                    <!-- name="codigo" es el objeto recibido en la categoria  -->
                    <!-- Si el codigo no es validado lo debe volver  a mostrar  -->
                    <input type="text" name="tipo_vehiculo" required value="{{old('tipo_vehiculo')}}" class="form-control" placeholder="Tipo de vehiculo..."></input>
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