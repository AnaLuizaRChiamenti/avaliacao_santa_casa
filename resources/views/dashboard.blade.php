<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Painel Administrativo
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Sistema de controle de usuários, permissões e módulos operacionais.
                </p>
            </div>

            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700">
                {{ Auth::user()->role === 'admin' ? 'Administrador' : 'Colaborador' }}
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6 mb-6">
                <div class="flex items-start gap-4">
                    <div class="h-12 w-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <span class="text-blue-700 text-xl font-semibold">
                            +
                        </span>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Bem-vindo(a), {{ Auth::user()->name }}
                        </h3>

                        <p class="text-gray-500 mt-1">
                            Utilize o menu superior para acessar as áreas disponíveis conforme seu perfil.
                        </p>
                    </div>
                </div>
            </div>

            @if (Auth::user()->role === 'admin')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('users.index') }}"
                       class="block bg-white border border-gray-100 shadow-sm rounded-xl p-6 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">
                                    Usuários
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Cadastre, edite e gerencie usuários do sistema.
                                </p>
                            </div>

                            <span class="text-blue-600 text-2xl">
                                →
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('permissions.index') }}"
                       class="block bg-white border border-gray-100 shadow-sm rounded-xl p-6 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800">
                                    Permissões
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Gerencie as permissões disponíveis para colaboradores.
                                </p>
                            </div>

                            <span class="text-blue-600 text-2xl">
                                →
                            </span>
                        </div>
                    </a>
                </div>
            @endif

            @if (Auth::user()->role === 'colaborador')
                <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        Módulos disponíveis
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if (Auth::user()->permissions()->where('slug', 'setores-hospitalares')->exists())
                            <a href="{{ route('modules.setores-hospitalares') }}"
                               class="border border-gray-100 rounded-lg p-4 hover:bg-blue-50 transition">
                                <h4 class="font-semibold text-gray-800">Setores Hospitalares</h4>
                                <p class="text-sm text-gray-500 mt-1">Acesse o módulo de setores hospitalares.</p>
                            </a>
                        @endif

                        @if (Auth::user()->permissions()->where('slug', 'especialidades-medicas')->exists())
                            <a href="{{ route('modules.especialidades-medicas') }}"
                               class="border border-gray-100 rounded-lg p-4 hover:bg-blue-50 transition">
                                <h4 class="font-semibold text-gray-800">Especialidades Médicas</h4>
                                <p class="text-sm text-gray-500 mt-1">Acesse o módulo de especialidades médicas.</p>
                            </a>
                        @endif

                        @if (Auth::user()->permissions()->where('slug', 'equipamentos')->exists())
                            <a href="{{ route('modules.equipamentos') }}"
                               class="border border-gray-100 rounded-lg p-4 hover:bg-blue-50 transition">
                                <h4 class="font-semibold text-gray-800">Equipamentos</h4>
                                <p class="text-sm text-gray-500 mt-1">Acesse o módulo de equipamentos.</p>
                            </a>
                        @endif

                        @if (Auth::user()->permissions()->where('slug', 'unidades-assistenciais')->exists())
                            <a href="{{ route('modules.unidades-assistenciais') }}"
                               class="border border-gray-100 rounded-lg p-4 hover:bg-blue-50 transition">
                                <h4 class="font-semibold text-gray-800">Unidades Assistenciais</h4>
                                <p class="text-sm text-gray-500 mt-1">Acesse o módulo de unidades assistenciais.</p>
                            </a>
                        @endif
                    </div>

                    @if (Auth::user()->permissions()->count() === 0)
                        <div class="mt-4 p-4 rounded-lg bg-yellow-50 text-yellow-800 text-sm">
                            Nenhum módulo foi liberado para este usuário.
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
