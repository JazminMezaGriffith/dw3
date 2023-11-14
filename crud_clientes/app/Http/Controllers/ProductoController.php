<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use DB;

class ProductoController extends Controller
{
    public function index()
    {
        //Obtener datos por ORM Eloquent    
        $productos = Producto::all();
        //$productos = DB::select('select * from productos');
        //return $productos;
        return view('productos.index', compact('productos'));
    }

    public function crear(Request $request)
    {
        /* $request->validate([
            'nombre'=>'required|String',
            'descripcion'=>'required',
            'marca'=>'required|integer',
            'stock'=>'required|integer'
        ]); */
        
        Producto::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'marca' => $request->input('marca'),
            'stock' => $request->input('stock'),
            'precio' => $request->input('precio'),
            'iva' => $request->input('iva'),
            'stock_min' => $request->input('stock_min'),
            'estado' => $request->input('estado'),
        ]);
        return redirect()->route('index')->with('success', 'Se creo correctamente!');
    }

    public function formulario()
    {
        return view('productos.formulario');
    }

    public function editar($id)
    {
        $productos = Producto::find($id);
        return view('productos.editar', compact('productos'));
    }
    public function actualizar(Request $request, $id)
    {
        $productos = Producto::find($id);
        $productos->nombre = $request->input('nombre');
        $productos->descripcion = $request->input('descripcion');
        $productos->marca = $request->input('marca');
        $productos->stock = $request->input('stock');
        $productos->precio = $request->input('precio');
        $productos->iva = $request->input('iva');
        $productos->stock_min = $request->input('stock_min');
        $productos->estado = $request->input('estado');
        $productos->save();
        return redirect()->route('index');
    }

    public function ver($id)
    {
        $productos = Producto::find($id);
        return view('productos.ver', compact('productos'));
    }

    public function eliminar($id)
    {
        $productos = Producto::find($id);
        $productos->delete();
        return redirect()->route('index');
    }

    public function buscar(Request $request) {
        $buscar = $request->input('buscar');
        $productos = Producto::where(function ($query) use ($buscar) {
        $query->where('nombre', 'like', "%$buscar%")
            ->orWhere('descripcion', 'like', "%$buscar%")
            ->orWhere('marca', 'like', "$buscar")
            ->orWhere('stock', 'like', "$buscar")
            ->orWhere('precio', 'like', "$buscar")
            ->orWhere('iva', 'like', "$buscar")
            ->orWhere('stock_min', 'like', "$buscar")
            ->orWhere('estado', 'like', "$buscar");
        })->paginate(3);
        $vacio = $productos->isEmpty();
        return view('productos.index', compact('productos', 'vacio'));
    }
}
