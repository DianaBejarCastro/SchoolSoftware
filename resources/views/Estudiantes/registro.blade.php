@extends('layout')


@section('title')
    Registro
@endsection



@section('contenedor')
 <h3>Registro de Datos Estudiante</h3>
 <div class="col-11">

    <div style="width: 60%">
    <form id="regEstudiante"action="">
    @csrf
    <div>
        <label for="ci">Carnet de Identidad: </label>
        <input type="text" name="ci" id="ci" class="form-control" placeholder="Ingrese el carnet de identidad"/>

    </div>
    <div>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del estudiante" />

    </div>
    <div>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese el apellido del estudainte" />

    </div>
    <div>
        <label for="email">Correo Electronico: </label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese el correo del estudiante"/>
           
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

        var validator = $('#regEstudiante').validate({
            rules:{
                ci:{
                    required:true,
                },
                nombre:{
                    required:true,
                },
                apellido:{
                    required:true,
                },
                email:{
                    required:true,
                    email:true,
                },
            },
            messages:{
                ci:{
                    required:"Ingrese ci please",
                },
                nombre:{
                    required:"Ingrese nombre please",
                },
                apellido:{
                    required:"Ingrese Apellido por favor",
                },
                email:{
                    required:"Ingrese su correo electronico por favor ",
                    email:"Ingrese un email valido"
                },


            },
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: "{{route('estudiantes.store')}}",
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