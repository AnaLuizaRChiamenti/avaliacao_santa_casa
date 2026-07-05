<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Permissões</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('permissions.create') }}">Nova permissão</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table width="100%">
                    <thead>
                        <tr>
                            <th align="left">Nome</th>
                            <th align="left">Slug</th>
                            <th align="left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit', $permission) }}">Editar</a>

                                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Deseja excluir esta permissão?')">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($permissions->isEmpty())
                            <tr>
                                <td colspan="3">Nenhuma permissão cadastrada.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
