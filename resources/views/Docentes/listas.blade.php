@extends('layout')
@section('title')
Lista de Docentes

@section('contenedor')

<div class="container">

    <h2>LISTA DE DOCENTES</h2>


    <div  class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>
                        Busqueda de Docente
                        {{Form::open(['route' =>'docente.list','method'=>'GET', 'class'=>'form-inline pull-right'])}}
                        <div class="form-group">
                            {{Form::number('ci', null, ['class'=>'form-control','placeholder'=>'Ci'])}}
                        </div>

                        <div class="form-group">
                            {{Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre'])}}
                        </div>

                        <div class="form-group">
                            {{Form::text('apellido', null, ['class'=>'form-control','placeholder'=>'Apellido'])}}
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
            <td> ci </td>
            <td> nombre </td>
            <td> apellido </td>
            <td> email </td>
            <td> Editar </td>
            <td> Eliminar </td>
            <td>Registrar Materia </td>
             <td>Ver Materia </td>
        </tr>

    </thead>
    <tbody>
        @foreach ($data as $Itemdata)
        <tr>
            <td>{{$Itemdata->ci}}</td>
            <td>{{$Itemdata->nombre}}</td>
            <td>{{$Itemdata->apellido}}</td>
            <td>{{$Itemdata->email}}</td>
            <td><button class="btn btn-info"><a class="text-white" href="{{route('docente.getDates', $Itemdata->id)}}">Editar</a></button></td>
            <td><button class="btn btn-danger"><a class="text-white" href="{{route('docente.destroy', $Itemdata->id)}}">Eliminar</a></button></td> 
            <td><button class="btn btn-secondary"><a class="text-white" href="{{route('materia.indexDocente', $Itemdata->id)}}">Materia</a></button></td>
            <td><button class="btn btn-secondary"><a class="text-white" href="{{route('materia.retirarDocente', $Itemdata->id)}}"> Ver Materias</a></button></td>
        </tr>  
        @endforeach
        
    </tbody>
  
</table>


            </div>
        </div>
    </div>





@endsection
