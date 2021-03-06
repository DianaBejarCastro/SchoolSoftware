@extends('layout')
@section('title')
Registar Materias

@section('contenedor')

<div class="container">

    <h2>REGISTRAR MATERIAS- DOCENTE</h2>


    <div  class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>
                        Busqueda de Materia
                        {{Form::open(['route' =>'materia.list','method'=>'GET', 'class'=>'form-inline pull-right'])}}
                        <div class="form-group">
                            {{Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre Materia'])}}
                        </div>
                        <div class="form-group">
                            {{Form::text('turno', null, ['class'=>'form-control','placeholder'=>'Turno'])}}
                        </div>
                         <div class="form-group">
                            {{Form::date('fecha_inicio', null, ['class'=>'form-control','placeholder'=>'Fecha de Inicio'])}}
                        </div>
                         <div class="form-group">
                            {{Form::date('fecha_final', null, ['class'=>'form-control','placeholder'=>'Fecha Final'])}}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> BUSCAR
                                
                            </button>
                        </div>
                        {{Form::close()}}

                    
                    </h2>
                </div>

<table class="table table-bordered">
    <thead >
        <tr>
           
            <td> Nombre </td>
            <td> Turno </td>
            <td> Fecha de Inicio </td>
            <td> Fecha Cierre</td>
            <td> REGISTRAR</td>
          
            
        </tr>

    </thead>
    <tbody>
        @foreach ($data as $itemdata)
        @if ($itemdata->docente_id=="")
         <tr>
            <td>{{$itemdata->nombre}}</td>
            <td>{{$itemdata->turno}}</td>
            <td>{{$itemdata->fecha_inicio}}</td>
            <td>{{$itemdata->fecha_final}}</td>
            <td><button class="btn btn-info"><a class="text-white" href="{{route('materia.storeDocente',[$datos->id, $itemdata->id])}}">Registrar Materia</a></button></td>
            
        </tr>    
        @endif
        @endforeach
    </tbody>
  
</table>


            </div>
        </div>
    </div>





@endsection
