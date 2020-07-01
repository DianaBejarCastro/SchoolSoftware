@extends('layout')
@section('title')
Busqueda de Estudiantes 
@endsection

@section('contenedor')

{{-- comment
@include('partials.session-status') --}}


<div class="container">

    <h2>LISTA ESTUDIANTES </h2>

<table id="tableStudents" class="table table-bordered">
    <thead>
        <tr>
            <td> Ci </td>
            <td> Nombre </td>
            <td> Apellido </td>
            <td> Email </td>
            <td> Editar </td>
            <td> Eliminar </td>
        </tr>
    </thead>
    <tbody>
        <tr>
           
        </tr>
    </tbody>
  
</table>
</div>
@endsection
@push('js')
<script>

    $(document).ready(function () {
        var table= $('#tableStudents').DataTable({
            serverSide:true,
            processing:true,
            ajax:"{{route('estudiante.list')}}",
            columns:[
                {
                    data:'ci',
                    name:'ci',
                },
                {
                    data:'nombre',
                    name:'nombre',
                },
                {
                    data:'apellido',
                    name:'apellido',
                },
                {
                    data:'email',
                    name:'email',
                },
                {
                    "render": function(){
                        return '<td><button type="button" class="btn btn-info"><a class="text-white" href="">Editar</a></button></td>';
                    }
                },
                {
                    "render": function(){
                        return '<td><button type="button" class="btn btn-danger"><a class="text-white" href="">Eliminar</a></button></td>';
                    }
                },
                
            ]
        });

        
        
    });

</script>   
@endpush
