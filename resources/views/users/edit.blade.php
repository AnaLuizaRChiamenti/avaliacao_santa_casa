<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuário
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Nome</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full rounded border-gray-300">
                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">E-mail</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full rounded border-gray-300">
                        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Nova senha</label>
                        <input type="password" name="password" class="w-full rounded border-gray-300">
                        <small>Deixe em branco para manter a senha atual.</small>
                        @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium mb-2">Permissões</label>

                        @foreach($permissions as $permission)
                            <label class="block">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission->id }}"
                                    @checked(in_array($permission->id, old('permissions', $userPermissions)))
                                >
                                {{ $permission->name }}
                            </label>
                        @endforeach
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Atualizar
                        </button>

                        <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-300 rounded">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
