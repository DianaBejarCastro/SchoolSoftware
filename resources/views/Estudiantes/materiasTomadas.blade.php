@extends('layout')
@section('title')
Retirar  Materias

@section('contenedor')

<div class="container">

    <h2>LISTA DE MATERIAS TOMADAS- ESTUDIANTES</h2>


<table class="table table-bordered">
    <thead >
        <tr>
            <td> Nombre </td>
            <td> Turno </td>
            <td> Fecha de Inicio </td>
        </tr>

    </thead>
    <tbody>

        @foreach ($date as $itemdate)
       
        <tr>
            <td>{{$itemdate->nombre}}</td>
            <td>{{$itemdate->materianame}}</td>
            
            <td><button class="btn btn-info"><a class="text-white" href="{{route('materia.destroyEstudiante',$itemdate->id)}}">Retirar Materia</a></button></td> 
        </tr>
       
        @endforeach
    </tbody>
</table>
            </div>
        





@endsection
