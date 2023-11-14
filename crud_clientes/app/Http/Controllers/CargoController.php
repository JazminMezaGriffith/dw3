<?php

namespace App\Http\Controllers;
use App\Models\Cargo;

use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        //Obtener datos por ORM Eloquent    
        $cargos = Cargo::paginate(3);
        return view('cargos.index', compact('cargos'));
    }

    public function crear(Request $request)
    {
        Cargo::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'sector' => $request->input('sector'),
            'empresa' => $request->input('empresa'),
        ]);
        return redirect()->route('index')->with('success', 'Se creo correctamente!');
    }

    public function formulario()
    {
        return view('cargos.formulario');
    }
    public function eliminar($id)
    {
        $cargos = cargo::find($id);
        $cargos->delete();
        return redirect()->route('index');
    }
    
    public function editar($id)
    {
        $cargos = Cargo::find($id);
        return view('cargos.editar', compact('cargos'));
    }
    public function actualizar(Request $request, $id)
    {
        $cargos = cargo::find($id);
        $cargos->nombre = $request->input('nombre');
        $cargos->descripcion = $request->input('descripcion');
        $cargos->sector = $request->input('sector');
        $cargos->empresa = $request->input('empresa');
        $cargos->save();
        return redirect()->route('index');
    }

    public function ver($id)
    {
        $cargos = Cargo::find($id);
        return view('cargos.ver', compact('cargos'));
    }

    public function buscar(Request $request) {
        $buscar = $request->input('buscar');
        $cargos = Cargo::where(function ($query) use ($buscar) {
        $query->where('nombre', 'like', "%$buscar%")
            ->orWhere('descripcion', 'like', "%$buscar%")
            ->orWhere('sector', 'like', "$buscar")
            ->orWhere('empresa', 'like', "$buscar");
        })->paginate(3);
        $vacio = $cargos->isEmpty();
        return view('cargos.index', compact('cargos', 'vacio'));
    }
}
