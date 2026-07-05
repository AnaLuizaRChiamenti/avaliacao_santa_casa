<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:permissions,slug'],
        ]);

        Permission::create($data);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissão criada com sucesso.');
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:permissions,slug,' . $permission->id],
        ]);

        $permission->update($data);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissão atualizada com sucesso.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissão removida com sucesso.');
    }
}
