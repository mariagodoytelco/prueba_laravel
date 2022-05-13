<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Categoria;

class TareasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3'
        ]);
        $tarea = new Tarea;
        $tarea->nombre = $request->nombre;
        $tarea->categoria_id = $request->categoria_id;
        $tarea->save();
        return redirect()->route('tareas')->with('success', 'Tarea creada con éxito');
    }

    public function index()
    {
        $tareas = Tarea::all();
        $categorias = Categoria::all();
        return view('tareas.index', ['tareas' => $tareas, 'categorias' => $categorias]);
    }
    
    public function show($id)
    {
        $tarea = Tarea::find($id);
        $categorias = Categoria::all();
        return view('tareas.show', ['tarea' => $tarea, 'categorias' => $categorias]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|min:3'
        ]);
        $tarea = Tarea::find($id);
        $tarea->nombre = $request->nombre;
        $tarea->categoria_id = $request->categoria_id;
        $tarea->save();
        return redirect()->route('tareas')->with('success', 'Tarea actualizada con éxito');
    }

    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return redirect()->route('tareas')->with('success', 'Tarea eliminada con éxito');
    }
}
