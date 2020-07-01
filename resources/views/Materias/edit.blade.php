@extends('layout')

@section('title')
    Editar Materias
@endsection

@section('modelo')
@section('contenedor')


 <h3>Modificacion de Datos Materias</h3>
<section class="formulario">
<div class="col-11">
<div style="width: 60%">
<form id="editMaterias" action="">
    @csrf

    <input type="hidden" name="id" id="id" value="{{$data->id}}">
    <div>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del estudiante" value="{{$data->nombre}}"/>
     
    </div>
    <div>
        <label for="turno">Turno: </label>
        <select id="turno" name="turno" class="form-control" placeholder="Seleccione el turno de la materia">
            <option value="mañana">Turno-Mañana</option>
            <option value="tarde">Turno-Tarde</option>
            <option value="noche">Turno-Noche</option>
        </select>
    </div>
    <div>
        <label for="fecha_inicio">fecha de Inicio: </label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" placeholder="Seleccione fecha Inicio" value="{{$data->fecha_inicio}}" />
    
    </div>
    <div>
        <label for="fecha_final">Fecha Final</label>
        <input type="date" name="fecha_final" id="fecha_final" class="form-control" placeholder="Seleccione la fecha final" value={{$data->fecha_final}} />
     
    </div>
    <div>
        <br>
        <button id="idSubmit" name="idSubmit" class="btn btn-primary form-control" type="submit">Editar Datos</button>
    </div>
</form>
</div>
</div>
</section>
@endsection
 
@push('js')
<script>

    
    $(document).ready(function(){

        var validator = $('#editMaterias').validate({
            rules:{
                nombre:{
                    required:true,
                },
                turno:{
                    required:true,
                },
                fecha_inicio:{
                    required:true,
                },
                fecha_final:{
                    required:true,
                
                },
            },
            messages:{
                nombre:{
                    required:"Ingrese ci please",
                },
                turno:{
                    required:"Ingrese nombre please",
                },
                fecha_inicio:{
                    required:"Ingrese Apellido por favor",
                },
                fecha_final:{
                    required:"Ingrese su correo electronico por favor ",
                }
            },
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: "{{route('materia.edit')}}",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                       
                        window.location.href= "/lista-materias";
                       
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