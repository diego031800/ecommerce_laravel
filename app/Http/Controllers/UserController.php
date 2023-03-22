<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.edit')->only('edit','update');
    }

    public function index(Request $request)
    {
        $search = $request->adminlteSearch;
        $users = User::where('name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('users.edit',$user)->with('info', 'Se asigno los roles correctamente');
    }
}
