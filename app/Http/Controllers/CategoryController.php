<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categorias.index')->only('index');
        $this->middleware('can:categorias.create')->only('create', 'store');
        $this->middleware('can:categorias.edit')->only('edit', 'update');
        $this->middleware('can:categorias.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $search = $request->adminlteSearch;
        $categories = Category::where('name', 'like', '%' . $search . '%')->orderBy('id', 'asc')->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function show()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25',
        ]);

        $category = Category::create($request->all());

        return redirect()->route('categorias.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:25',
        ]);

        $category->update($request->all());

        return redirect()->route('categorias.index');
    }
}
