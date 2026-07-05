<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Administrativo Hospitalar</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 text-gray-800">
    <div class="min-h-screen flex flex-col">

        <header class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-blue-50 flex items-center justify-center">
                        <span class="text-blue-700 font-bold text-xl">+</span>
                    </div>

                    <div>
                        <h1 class="text-lg font-semibold text-gray-900">
                            Sistema Administrativo Hospitalar
                        </h1>
                        <p class="text-sm text-gray-500">
                            Controle de usuários, permissões e módulos operacionais
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                            Acessar painel
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                                Criar conta
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </header>

        <main class="flex-1">
            <section class="max-w-7xl mx-auto px-6 py-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                    <div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700 mb-5">
                            Avaliação Laravel
                        </span>

                        <h2 class="text-4xl font-bold text-gray-900 leading-tight">
                            Gestão administrativa para ambiente hospitalar
                        </h2>

                        <p class="mt-5 text-lg text-gray-600">
                            Uma aplicação Laravel para controle de acesso por perfil e permissões,
                            permitindo que administradores gerenciem usuários e que colaboradores
                            acessem apenas os módulos autorizados.
                        </p>

                        <div class="mt-8 flex flex-wrap gap-3">
                            @auth
                                <a href="{{ route('dashboard') }}"
                                   class="inline-flex items-center px-5 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 transition">
                                    Ir para o painel
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center px-5 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-blue-700 transition">
                                    Acessar sistema
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">
                            Funcionalidades implementadas
                        </h3>

                        <div class="space-y-4">
                            <div class="flex gap-4">
                                <div class="h-10 w-10 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-semibold">
                                    1
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Autenticação</h4>
                                    <p class="text-sm text-gray-500">
                                        Login com e-mail e senha utilizando Laravel Breeze.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="h-10 w-10 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-semibold">
                                    2
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Usuários e permissões</h4>
                                    <p class="text-sm text-gray-500">
                                        CRUD administrativo para usuários, perfis e permissões.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="h-10 w-10 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-semibold">
                                    3
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Controle de acesso</h4>
                                    <p class="text-sm text-gray-500">
                                        Bloqueio real de rotas por perfil e permissões de módulos.
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="h-10 w-10 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-semibold">
                                    4
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Módulos operacionais</h4>
                                    <p class="text-sm text-gray-500">
                                        Setores Hospitalares, Especialidades Médicas, Equipamentos e Unidades Assistenciais.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <footer class="bg-white border-t border-gray-100">
            <div class="max-w-7xl mx-auto px-6 py-5 text-sm text-gray-500 flex items-center justify-between">
                <span>
                    Desenvolvido em Laravel
                </span>

                <span>
                    Santa Casa — Avaliação técnica
                </span>
            </div>
        </footer>

    </div>
</body>
</html>
