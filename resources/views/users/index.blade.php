<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Usuários</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('users.create') }}">Novo usuário</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table width="100%">
                    <thead>
                        <tr>
                            <th align="left">Nome</th>
                            <th align="left">E-mail</th>
                            <th align="left">Permissões</th>
                            <th align="left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->permissions->pluck('name')->join(', ') ?: 'Sem permissões' }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}">Editar</a>

                                    @if (Auth::id() !== $user->id)
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" onclick="return confirm('Deseja excluir este usuário?')">
                                                Excluir
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="4">Nenhum usuário cadastrado.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
