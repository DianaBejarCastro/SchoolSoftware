<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table>
        <thead>

        </thead>
        <tbody>
            
            @foreach ($notas as $nota)

            <tr>
                <td>{{$nota->id}}</td>
                <td>{{$nota->titulo}}</td>

                <td>
                   {{-- comment --}}
                    @can('editar_estudiantes')
                    <a href="{{route('notas.destroy', $nota->id)}}">Eliminar nota</a>
                    @else
                        <h3>Usted no tiene permiso para Eliminar</h3>
                    @endcan

                </td>

            </tr>
        
            @endforeach

        </tbody>

    </table>

    
</body>
</html>