<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('permissions')->orderBy('name')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('users.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\'-]+$/u',
            ],
            'email' => [
                'required',
                'email:rfc',
                'max:255',
                'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'role' => [
                'required',
                Rule::in(['admin', 'colaborador']),
            ],
            'permissions' => [
                'required_if:role,colaborador',
                'array',
            ],
            'permissions.*' => [
                'exists:permissions,id',
            ],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        if ($data['role'] === 'colaborador') {
            $user->permissions()->sync($data['permissions']);
        } else {
            $user->permissions()->sync([]);
        }

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    public function edit(User $user)
    {
        $permissions = Permission::orderBy('name')->get();
        $userPermissions = $user->permissions->pluck('id')->toArray();

        return view('users.edit', compact('user', 'permissions', 'userPermissions'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\'-]+$/u',
            ],
            'email' => [
                'required',
                'email:rfc',
                'max:255',
                'regex:/^[^@\s]+@[^@\s]+\.[^@\s]+$/',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
            'role' => [
                'required',
                Rule::in(['admin', 'colaborador']),
            ],
            'permissions' => [
                'required_if:role,colaborador',
                'array',
            ],
            'permissions.*' => [
                'exists:permissions,id',
            ],
        ]);

        if ($request->user()->id === $user->id && $data['role'] !== 'admin') {
            return back()
                ->withErrors(['role' => 'Você não pode alterar seu próprio perfil de administrador.'])
                ->withInput();
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'] ? Hash::make($data['password']) : $user->password,
            'role' => $data['role'],
        ]);

        if ($data['role'] === 'colaborador') {
            $user->permissions()->sync($data['permissions']);
        } else {
            $user->permissions()->sync([]);
        }

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        if (request()->user()->id === $user->id) {
            return redirect()
                ->route('users.index')
                ->withErrors(['user' => 'Você não pode excluir o próprio usuário.']);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso.');
    }
}
