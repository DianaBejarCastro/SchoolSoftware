<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Html\Eloquent\FormAccessible;
use App\Docente;

class DocenteController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('manejo_materias_docentes')) {
            return view('Docentes.registro');
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('manejo_materias_docentes')) {
            $docente = new Docente();
            $request->validate([
                'ci' => ['required', 'regex:/^[0-9]+$/', 'unique:estudiantes'],
                'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'email' => ['required', 'email', 'unique:estudiantes'],
            ]);
            //  DB::table('estudiantes')->insert([
            //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
            //]);
            $docente->ci = $request->ci;
            $docente->nombre = $request->nombre;
            $docente->apellido = $request->apellido;
            $docente->email = $request->email;
            $docente->saveOrFail();
            return response()->json(['success' => "Datos Registrados"]);
        } else {
            abort(403);
        }
    }

    public function list(Request $request)
    {
        if (auth()->user()->can('manejo_materias_docentes')) {

            $ci = $request->get('ci');
            $nombre = $request->get('nombre');
            $apellido = $request->get('apellido');
            $data = Docente::ci($ci)
                ->nombre($nombre)
                ->apellido($apellido)

                ->paginate(8);
            return view('Docentes.listas', compact('data'));
        } else {
            abort(403);
        }
    }


    public function getDates($id)
    {
        $data = Docente::findOrFail($id);
        return view('Docentes.edit', compact('data'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'ci' => ['required', 'regex:/^[0-9]+$/', 'unique:estudiantes,ci,' . $request->id],
            'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email', 'unique:estudiantes,email,' . $request->id],

        ]);
        //  DB::table('estudiantes')->insert([
        //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
        //]);
        $data = Docente::findOrFail($request->id);
        $data->ci = $request->ci;
        $data->nombre = $request->nombre;
        $data->apellido = $request->apellido;
        $data->email = $request->email;
        $data->saveOrFail();
        // return $this->list();
        return response()->json(['success' => "Datos Registrados"]);
    }

    public function destroy($id)
    {
        $data = Docente::findOrFail($id);
        $data->delete();
        return redirect()->route('docente.list');
    }
}
