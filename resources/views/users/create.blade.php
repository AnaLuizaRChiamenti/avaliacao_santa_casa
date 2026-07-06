<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Novo Usuário
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a
                    href="{{ route('users.index') }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800"
                >
                    ← Voltar para usuários
                </a>
            </div>

            <div class="bg-white border border-gray-100 shadow-sm rounded-xl overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Dados do usuário
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Preencha os dados para cadastrar um novo usuário.
                    </p>
                </div>

                <form
                    method="POST"
                    action="{{ route('users.store') }}"
                    x-data="{ role: '{{ old('role', 'colaborador') }}' }"
                    onkeydown="if (event.key === 'Enter') { event.preventDefault(); }"
                    class="p-6 space-y-6"
                >
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nome
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            E-mail
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Senha
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Confirmar senha
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Perfil
                        </label>

                        <select
                            name="role"
                            x-model="role"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="colaborador" @selected(old('role', 'colaborador') === 'colaborador')>
                                Colaborador
                            </option>

                            <option value="admin" @selected(old('role') === 'admin')>
                                Administrador
                            </option>
                        </select>

                        @error('role')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div
                        x-show="role === 'colaborador'"
                        x-cloak
                        class="rounded-lg border border-gray-100 bg-gray-50 p-4"
                    >
                        <div class="mb-3">
                            <label class="block text-sm font-semibold text-gray-800">
                                Permissões dos módulos
                            </label>

                            <p class="text-sm text-gray-500 mt-1">
                                Selecione quais módulos operacionais este colaborador poderá acessar.
                            </p>
                        </div>

                        <div class="space-y-2">
                            @foreach($permissions as $permission)
                                <label class="flex items-center gap-2 text-sm text-gray-700">
                                    <input
                                        type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->id }}"
                                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                        @checked(in_array($permission->id, old('permissions', [])))
                                    >

                                    <span>{{ $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        @error('permissions')
                            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
                        @enderror
                    </div>

                    <div
                        x-show="role === 'admin'"
                        x-cloak
                        class="rounded-lg border border-blue-100 bg-blue-50 p-4"
                    >
                        <p class="text-sm text-blue-800">
                            Administradores acessam apenas as áreas de Usuários e Permissões.
                            Permissões de módulos operacionais não se aplicam a este perfil.
                        </p>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                        <a
                            href="{{ route('users.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-200 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 transition"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition"
                        >
                            Salvar usuário
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
