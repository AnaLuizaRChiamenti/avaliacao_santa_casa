<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuários
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Gerencie os usuários, perfis e permissões de acesso ao sistema.
            </p>
        </div>
    </x-slot>

    <div
        class="py-10 bg-gray-50 min-h-screen"
        x-data="{
            showDeleteModal: false,
            deleteUserName: '',
            deleteUserUrl: ''
        }"
    >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-red-800">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Lista de usuários
                    </h3>
                    <p class="text-sm text-gray-500">
                        Visualize, edite ou remova usuários cadastrados.
                    </p>
                </div>

                <a
                    href="{{ route('users.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition"
                >
                    Novo usuário
                </a>
            </div>

            <div class="bg-white border border-gray-100 overflow-hidden shadow-sm rounded-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    E-mail
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Perfil
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Permissões
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900">
                                            {{ $user->name }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($user->role === 'admin')
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                                Administrador
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700">
                                                Colaborador
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        @if ($user->role === 'admin')
                                            <span class="text-sm text-gray-400">
                                                Não se aplica
                                            </span>
                                        @else
                                            {{ $user->permissions->pluck('name')->join(', ') ?: 'Sem permissões' }}
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <a
                                            href="{{ route('users.edit', $user) }}"
                                            class="inline-flex items-center px-3 py-1.5 rounded-md text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition"
                                        >
                                            Editar
                                        </a>

                                        @if (Auth::id() !== $user->id)
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-1.5 rounded-md text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 transition"
                                                x-on:click="
                                                    showDeleteModal = true;
                                                    deleteUserName = '{{ addslashes($user->name) }}';
                                                    deleteUserUrl = '{{ route('users.destroy', $user) }}';
                                                "
                                            >
                                                Excluir
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                        Nenhum usuário cadastrado.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div
            x-show="showDeleteModal"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center px-4"
        >
            <div
                class="fixed inset-0 bg-gray-900 bg-opacity-50"
                x-on:click="showDeleteModal = false"
            ></div>

            <div class="relative bg-white rounded-xl shadow-xl max-w-md w-full p-6">
                <h3 class="text-lg font-semibold text-gray-900">
                    Excluir usuário
                </h3>

                <p class="mt-2 text-sm text-gray-600">
                    Deseja excluir o usuário
                    <span class="font-semibold text-gray-900" x-text="deleteUserName"></span>?
                </p>

                <p class="mt-2 text-sm text-gray-500">
                    Essa ação não poderá ser desfeita.
                </p>

                <div class="mt-6 flex justify-end gap-3">
                    <button
                        type="button"
                        class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-200 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 transition"
                        x-on:click="showDeleteModal = false"
                    >
                        Cancelar
                    </button>

                    <form method="POST" x-bind:action="deleteUserUrl">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition"
                        >
                            Excluir usuário
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
