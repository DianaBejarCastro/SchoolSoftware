@extends('layout')
@section('title')
Lista de Estudiantes

@section('contenedor')

<div class="container">

    <h2>LISTA DE ESTUDIANTES</h2>


    <div  class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>
                        Busqueda de usuario
                        {{Form::open(['route' =>'estudiante.listbefore','method'=>'GET', 'class'=>'form-inline pull-right'])}}
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
        </tr>

    </thead>
    <tbody>
        @foreach ($data as $Itemdata)
        <tr>
            <td>{{$Itemdata->ci}}</td>
            <td>{{$Itemdata->nombre}}</td>
            <td>{{$Itemdata->apellido}}</td>
            <td>{{$Itemdata->email}}</td>
            <td><button class="btn btn-info"><a class="text-white" href="{{route('estudiantes.getDates',$Itemdata->id)}}">Editar</a></button></td>
            <td><button class="btn btn-danger"><a class="text-white" href="{{route('estudiante.destroy',$Itemdata->id)}}">Eliminar</a></button></td> 
            <td><button class="btn btn-secondary"><a class="text-white" href="{{route('materia.indexEstudiante', $Itemdata->id)}}">Materia</a></button></td>
            <td><button class="btn btn-secondary"><a class="text-white" href="{{route('materia.retirarEstudiante', $Itemdata->id)}}">Ver Materias</a></button></td>
        </tr>  
        @endforeach
        
    </tbody>
  
</table>
{{$data->appends(request()->query())->links()}}

            </div>
        </div>
    </div>





@endsection
