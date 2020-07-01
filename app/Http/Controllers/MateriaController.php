<?php

namespace App\Http\Controllers;

use Collective\Html\Eloquent\FormAccessible;

use Illuminate\Http\Request;
use App\Materia;

class MateriaController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('manejo_materias_docentes')) {
            return view('Materias.registro');
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('manejo_materias_docentes')) {
            $materia = new Materia();
            $request->validate([
                'nombre' =>  'required',
                'turno' => 'required',
                'fecha_inicio' => ['required', 'date', 'after:today'],
                'fecha_final' => ['required', 'date', 'after:fechaInicio'],
            ]);
            //  DB::table('estudiantes')->insert([
            //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
            //]);
            $materia->nombre = $request->nombre;
            $materia->turno = $request->turno;
            $materia->fecha_inicio = $request->fecha_inicio;
            $materia->fecha_final = $request->fecha_final;
            $materia->saveOrFail();
            return response()->json(['success' => "Datos Registrados"]);
        } else {
            abort(403);
        }
    }

    public function list(Request $request)
    {
        if (auth()->user()->can('manejo_materias_docentes')) {
            $nombre = $request->get('nombre');
            $turno = $request->get('turno');
            $fecha_inicio = $request->get('fecha_inicio');
            $fecha_final = $request->get('fecha_final');
            $data = Materia::nombre($nombre)
                ->turno($turno)
                ->fecha_inicio($fecha_inicio)
                ->fecha_final($fecha_final)
                ->paginate(8);
            return view('Materias.listas', compact('data'));
        } else {
            abort(403);
        }
    }

    public function getDates($id)
    {
        $data = Materia::findOrFail($id);
        return view('Materias.edit', compact('data'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' =>  ['required', 'regex:/^[\pL\s\-]+$/u'],
            'turno' => 'required',
        ]);
        //  DB::table('estudiantes')->insert([
        //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
        //]);
        $data = Materia::findOrFail($request->id);
        $data->nombre = $request->nombre;
        $data->turno = $request->turno;
        $data->fecha_inicio = $request->fecha_inicio;
        $data->fecha_final = $request->fecha_final;
        $data->saveOrFail();
        // return $this->list();
        return response()->json(['success' => "Datos Registrados"]);
    }

    public function destroy($id)
    {
        $datos = Materia::findOrFail($id);
        $datos->delete();
        return redirect()->route('materia.list');
    }
}
