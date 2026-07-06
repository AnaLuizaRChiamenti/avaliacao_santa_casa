<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Permissão
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Atualize o nome e o slug da permissão selecionada.
            </p>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a
                    href="{{ route('permissions.index') }}"
                    class="text-sm font-medium text-blue-600 hover:text-blue-800"
                >
                    ← Voltar para permissões
                </a>
            </div>

            <div class="bg-white border border-gray-100 shadow-sm rounded-xl overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Dados da permissão
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Altere as informações da permissão com cuidado, pois o slug é usado no controle de acesso.
                    </p>
                </div>

                <form
                    method="POST"
                    action="{{ route('permissions.update', $permission) }}"
                    class="p-6 space-y-6"
                    onkeydown="if (event.key === 'Enter') { event.preventDefault(); }"
                >
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nome
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $permission->name) }}"
                            placeholder="Ex: Setores Hospitalares"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Slug
                        </label>

                        <input
                            type="text"
                            name="slug"
                            value="{{ old('slug', $permission->slug) }}"
                            placeholder="Ex: setores-hospitalares"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        <p class="text-sm text-gray-500 mt-1">
                            Use apenas letras minúsculas, números e hífen. Não utilize espaços, acentos ou letras maiúsculas.
                        </p>

                        @error('slug')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="rounded-lg border border-yellow-100 bg-yellow-50 p-4">
                        <p class="text-sm text-yellow-800">
                            Atenção: alterar o slug pode afetar o acesso aos módulos que utilizam essa permissão nas rotas.
                        </p>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                        <a
                            href="{{ route('permissions.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-200 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 transition"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition"
                        >
                            Atualizar permissão
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
