@extends('layout')
@section('title')
Lista de Estudiantes
@endsection
{{-- PARA mandar un mensaje obteniendo al nombre de usuario 

@auth
<h3>Bienvenid@ {{auth()->user()->name}} </h3> 
@endauth--}}
@section('contenedor')

{{-- comment
@include('partials.session-status') --}}


<div class="container">

    <h2>LISTA ESTUDIANTES </h2>

{{-- comment 

<h4> Buscar</h4>

<form>

<input type="text" name="search" id="search" placeholder="Ingrese dato a buscar">

 <button id="idSubmit" name="idSubmit" type="submit">Buscar</button>


--}}
<table>
    <thead>
        <tr>
            <td> ci </td>
            <td> nombre </td>
            <td> apellido </td>
            <td> email </td>
            @auth
                <td> Editar </td>
            @endauth
             @auth
                <td> Eliminar </td>
            @endauth
             @auth
                <td>Registrar Materia </td>
            @endauth

        </tr>

    </thead>
    <tbody>
        @foreach ($data as $Itemdata)
        <tr>
            <td>{{$Itemdata->ci}}</td>
            <td>{{$Itemdata->nombre}}</td>
            <td>{{$Itemdata->apellido}}</td>
            <td>{{$Itemdata->email}}</td>
            @auth
                <td><button><a class="btn-list" href="{{route('estudiantes.getDates', $Itemdata->id)}}">Editar</a></button></td>
            @endauth
            @auth
                 <td><button><a class="btn-list" href="">Eliminar</a></button></td>
            @endauth
            @auth
                 <td><button><a class="btn-list" href="">Materia</a></button></td> 
            @endauth
           
        </tr>  
       
        @endforeach
        
    </tbody>
  
</table>

</div>



@endsection
