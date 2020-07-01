<?php

namespace App\Http\Controllers;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Http\Request;
use App\Estudiante;
use DataTables;

class EstudianteController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('editar_estudiantes')) {
            return view('Estudiantes.registro');
        } else {
            abort(403);
        }
    }

    public function viewDatos()
    {
        if (auth()->user()->can('editar_estudiantes')) {
            return view('Estudiantes.listDataTable');
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('editar_estudiantes')) {
            $estudiante = new Estudiante();
            $request->validate([
                'ci' => ['required', 'regex:/^[0-9]+$/', 'unique:estudiantes'],
                'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'email' => ['required', 'email', 'unique:estudiantes'],
            ]);
            //  DB::table('estudiantes')->insert([
            //    'ci' => $request->ci, 'nombre' => $request->nombre, 'apellido' => $request->apellido, 'correo' => $request->correo
            //]);
            $estudiante->ci = $request->ci;
            $estudiante->nombre = $request->nombre;
            $estudiante->apellido = $request->apellido;
            $estudiante->email = $request->email;
            $estudiante->saveOrFail();
            return response()->json(['success' => "Datos Registrados"]);
            // return "Registro Correcto";
        } else {
            abort(403);
        }
    }

    public function listbefore(Request $request)
    {
        //$data = Estudiante::ci($ci)->paginate();
        //$data = Estudiante::all();
        $ci = $request->get('ci');
        $nombre = $request->get('nombre');
        $apellido = $request->get('apellido');
        $data = Estudiante::ci($ci)
            ->nombre($nombre)
            ->apellido($apellido)
            ->paginate(8);
        return view('Estudiantes.listExacta', compact('data'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $datos = Estudiante::all();
            return DataTables::of($datos)->make(true);
        }
    }

    public function getDates($id)
    {
        $data = Estudiante::findOrFail($id);
        return view('Estudiantes.editar', compact('data'));
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
        $data = Estudiante::findOrFail($request->id);
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
        $data = Estudiante::findOrFail($id);
        $data->delete();
        return redirect()->route('estudiante.listbefore');
    }
}
