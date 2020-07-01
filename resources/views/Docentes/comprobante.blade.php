@extends('layout')
@section('title')
    Editar Materias
@endsection

@section('modelo')
@section('contenedor')


 <h3>COMPROBANTE</h3>
<section class="formulario">
<div class="col-11">
<div style="width: 60%">

    <div class="text-center font-weight-bold mark">
        <p class="font-italic ">Docente: {{$datos->nombre}}  {{$datos->apellido}}</p>
    <p class="font-italic">Con Ci: {{$datos->ci}}</p>
    <p class="font-italic ">Materia: {{$data->nombre}}</p>
    <p class="font-italic">Turno: {{$data->turno}}</p>
    <p class="font-italic">fecha de Inicio: {{$data->fecha_inicio}}</p>
    <p class="font-italic">fecha de Inicio: {{$data->fecha_final}}</p>
    </div>
    
<form id="editDocente" action="">
    @csrf

    <input type="hidden" name="id" id="id" value="{{$data->id}}">
    <div>
        <input type="hidden" name="docente_id" id="docente_id" class="form-control" placeholder="Seleccione la fecha final" value={{$datos->id}} />
    </div>
    <div>
        <br>
        <button id="idSubmit" name="idSubmit" class="btn btn-primary form-control" type="submit">Registrar Materia</button>
    </div>
</form>
</div>
</div>
</section>
@endsection


@push('js')
<script>

    
    $(document).ready(function(){

        var validator = $('#editDocente').validate({
            rules:{
                id:{
                    required:true,
                },
                docente_id:{
                    required:true,
                },
            },
            
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: "{{route('materia.saveDocente')}}",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        window.location.href= "/lista-docente";
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