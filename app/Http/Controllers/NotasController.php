<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nota;


class NotasController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('editar_estudiantes')) {
            $notas = Nota::all();
            return view('notas.index', compact('notas'));
        } else {
            abort(403);
        }
    }

    public function store(Request $request)
    {
        //
    }


    public function destroy($id)
    {
        // if (auth()->user()->can('eliminar-notas')) {
        Nota::findOrFail($id)->delete();
        return redirect()->back();
        // } else {
        //    abort(403);
        // }
    }
}
