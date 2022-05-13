<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', ['categorias' => $categorias]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias|max:255',
            'color' => 'required|max:7'
        ]);
        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->color = $request->color;
        $categoria->save();
        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito');
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show', ['categoria' => $categoria]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'color' => 'required|max:7'
        ]);
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->color = $request->color;
        $categoria->save();
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito');
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->tareas->each(function($tarea) {
            $tarea->delete();
        });
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito');
    }
}
