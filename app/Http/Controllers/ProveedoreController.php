<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Models\Regione;
use Illuminate\Http\Request;

class ProveedoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:proveedores.index')->only('index');
        $this->middleware('can:proveedores.create')->only('create', 'store');
        $this->middleware('can:proveedores.edit')->only('edit', 'update');
        $this->middleware('can:proveedores.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $search = $request->adminlteSearch;
        $proveedores = Proveedore::where('estado', '=', '1')->where('name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate();

        return view('admin.proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        $regiones = Regione::where('estado', '=', '1')->get();

        return view('admin.proveedores.create', compact('regiones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:proveedores',
            'telefono' => 'required|numeric',
            'calle' => 'required',
            'distrito' => 'required',
            'numero' => 'required|numeric',
            'regione_id' => 'required'
        ], [
            'email.unique' => 'Ya hay un proveedor registrado con el mismo email.',
        ]);

        $proveedore = new Proveedore();
        $proveedore->name = $request->name;
        $proveedore->email = $request->email;
        $proveedore->telefono = $request->telefono;
        $proveedore->calle = $request->calle;
        $proveedore->distrito = $request->distrito;
        $proveedore->numero = $request->numero;
        $proveedore->regione_id = $request->regione_id;
        $proveedore->estado = '1';
        $proveedore->save();

        return redirect()->route('proveedores.index')->with('datos', 'Registro Guardado !! ...')->with('estilo', 'success');
    }

    public function edit(Proveedore $proveedore)
    {
        $regiones = Regione::all();

        return view('admin.proveedores.edit', compact('proveedore', 'regiones'));
    }

    public function update(Request $request, Proveedore $proveedore)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required|numeric',
            'calle' => 'required',
            'distrito' => 'required',
            'numero' => 'required|numeric',
            'regione_id' => 'required'
        ], [
            'email.unique' => 'Ya hay un proveedor registrado con el mismo email.',
        ]);

        $proveedore->update($request->all());

        return redirect()->route('proveedores.index')->with('datos', 'Registro Actualizado !! ...')->with('estilo', 'warning');
    }

    public function destroy(Proveedore $proveedore)
    {
        $proveedore->estado = '0';
        $proveedore->save();

        return redirect()->route('proveedores.index');
    }
}
