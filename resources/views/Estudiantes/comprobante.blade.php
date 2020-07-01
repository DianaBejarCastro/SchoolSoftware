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

    <h2>COMPROBANTE </h2>
<div class="col-11">

    <div style="width: 60%">

       <div class="text-center font-weight-bold mark">
            <p> Vista Previa</p>
        <p class="font-italic ">estudiante: {{$datos->nombre}}  {{$datos->apellido}}</p>
        <p class="font-italic">Con Ci: {{$datos->ci}}</p>
        <p class="font-italic ">Materia: {{$data->nombre}}</p>
        <p class="font-italic">Turno: {{$data->turno}}</p>
        <p class="font-italic">fecha de Inicio: {{$data->fecha_inicio}}</p>
        <p class="font-italic">fecha de Inicio: {{$data->fecha_final}}</p>

       </div>
       
    <form id="materiaEstudiante"action="">

    
       
    @csrf
    <div>
       
    
        <input type="hidden" name="estudiante_id" id="estudiante_id" class="form-control" placeholder="Ingrese el carnet de identidad" value="{{$datos->id}}"/>

    </div>
    <div>
       
        <input type="hidden" name="materia_id" id="materia_id" class="form-control" placeholder="Ingrese el nombre del estudiante" value="{{$data->id}}"/>

    </div>
    <div>
        <br>
        <button id="idSubmit" name="idSubmit" class="btn btn-primary form-control" type="submit">Registrar</button>
    </div>
</form>
</div>
</div>


@endsection

@push('js')
<script>
    $(document).ready(function(){

        var validator = $('#materiaEstudiante').validate({
            rules:{
                estudiante_id:{
                    required:true,
                },
                materia_id:{
                    required:true,
                },
            },
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: "{{route('materia.saveEstudiante')}}",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                    
                        window.location.href= "/lista-estudiante";
                    
                    },
                    error: function(errors){
                        console.log(errors);
                        console.log(errors.responseJSON.errors);
                        $(form).validate().showErrors(errors.responseJSON.errors);
                    }
                });
            }

        });
    })
</script>

    
@endpush