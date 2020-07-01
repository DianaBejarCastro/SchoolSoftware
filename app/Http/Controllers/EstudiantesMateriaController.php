<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Materia;
use App\Estudiante;
use App\Estudiante_Materia;
use App\Docente;

class EstudiantesMateriaController extends Controller
{
    public function indexDocente($id)
    {
        $datos = Docente::findOrFail($id);
        $data = Materia::all();
        return view('Docentes.materia', compact('data', 'datos'));
    }
    public function storeDocente($iddatos, $iditemdata)
    {
        $datos = Docente::findOrFail($iddatos);
        $data = Materia::findOrFail($iditemdata);
        return view('Docentes.comprobante', compact('datos', 'data'));
    }

    public function saveDocente(Request $request)
    {
        $request->validate([
            'docente_id' => 'required',
        ]);
        $data = Materia::findOrFail($request->id);
        $data->docente_id = $request->docente_id;
        $data->saveOrFail();
        return response()->json(['success' => "Datos Registrados"]);
    }

    public function indexEstudiante($id)
    {
        $encontrar = Estudiante_Materia::all();
        $datos = Estudiante::findOrFail($id);
        $data = Materia::all();
        return view('Estudiantes.materia', compact('data', 'datos', 'encontrar'));
    }
    public function storeEstudiante($iddatos, $iditemdata)
    {
        $datos = Estudiante::findOrFail($iddatos);
        $data = Materia::findOrFail($iditemdata);
        return view('Estudiantes.comprobante', compact('datos', 'data'));
    }
    public function saveEstudiante(Request $request)
    {
        $estudianteMateria = new Estudiante_Materia();
        $request->validate([
            'estudiante_id' => 'required',
            'materia_id' => 'required',
        ]);
        $estudianteMateria->estudiante_id = $request->estudiante_id;
        $estudianteMateria->materia_id = $request->materia_id;
        $estudianteMateria->saveOrFail();
        return response()->json(['success' => "Datos Registrados"]);
    }
    public function retirarEstudiante($id)
    {
        $date = Estudiante::join(
            'estudiantes_materias',
            'estudiantes.id',
            '=',
            'estudiantes_materias.estudiante_id'
        )->join(
            'materias',
            'estudiantes_materias.materia_id',
            '=',
            'materias.id'
        )->select('estudiantes_materias.id as id', 'estudiantes.nombre', 'materias.nombre as materianame')->where('estudiantes_materias.estudiante_id', '=', $id)->get();

        return view('Estudiantes.materiasTomadas', compact('date'));
    }

    public function destroyEstudiante($id)
    {

        $datos = Estudiante_Materia::findOrFail($id);
        $datos->delete();
        return redirect()->route('estudiante.listbefore');
    }
    public function retirarDocente($id)
    {
        $datos = Docente::findOrFail($id);
        $data = Materia::all();
        return view('Docentes.materiasTomadas', compact('data', 'datos'));
    }
    public function destroyDocente($id)
    {

        $datos = Materia::findOrFail($id);
        $datos->docente_id = null;
        $datos->saveOrFail();
        return redirect()->back();
    }
}
