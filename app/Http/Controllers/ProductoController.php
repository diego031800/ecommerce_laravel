<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Producto;
use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:productos.index')->only('index');
        $this->middleware('can:productos.create')->only('create', 'store');
        $this->middleware('can:productos.edit')->only('edit', 'update');
        $this->middleware('can:productos.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $search = $request->adminlteSearch;
        $productos = Producto::where('estado', '=', '1')->where('name','like','%'.$search.'%')->orderBy('id', 'desc')->paginate();

        return view('admin.productos.index',compact('productos'));
    }

    public function create()
    {
        $proveedores = Proveedore::where('estado', '=', '1')->get();

        $categories = Category::where('estado', '=', '1')->get();

        return view('admin.productos.create',compact('proveedores','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'descripcion' => 'required',
            'stock' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'required|image',
            'proveedore_id' => 'required',
            'category_id' => 'required'
        ]);
        
        $producto = new Producto();

        $file = $request->file('imagen');
        $destinationPath = 'img/productos/';
        $filename = time() . '-' . $file->getClientOriginalName();
        $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
        $url = $destinationPath . $filename;

        $producto = new Producto();
        $producto->name = $request->name;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->imagen = $url;
        $producto->estado = '1';
        $producto->proveedore_id = $request->proveedore_id;
        $producto->category_id = $request->category_id;
        $producto->save();

        return redirect()->route('productos.index')->with('datos', 'Registro Guardado !! ...')->with('estilo', 'success');
    }

    public function edit(Producto $producto)
    {
        $proveedores = Proveedore::where('estado', '=', '1')->get();

        $categories = Category::where('estado', '=', '1')->get();

        return view('admin.productos.edit', compact('producto', 'categories','proveedores'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'name' => 'required|max:20',
            'descripcion' => 'required',
            'stock' => 'required|min:0',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'required|image',
            'proveedore_id' => 'required',
            'category_id' => 'required'
        ]);

        $file = $request->file('imagen');
        $destinationPath = 'img/productos/';
        $filename = time() . '-' . $file->getClientOriginalName();
        $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
        $url = $destinationPath . $filename;

        $producto->name = $request->name;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->imagen = $url;
        $producto->proveedore_id = $request->proveedore_id;
        $producto->category_id = $request->category_id;
        $producto->save();

        return redirect()->route('productos.index')->with('datos', 'Registro Guardado !! ...')->with('estilo', 'success');
    }

    public function destroy(Producto $producto)
    {
        $producto->estado = '0';
        $producto->save();

        return redirect()->route('productos.index');
    }
}
