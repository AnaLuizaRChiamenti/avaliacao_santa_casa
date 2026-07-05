<x-guest-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-6">
        <div class="w-full max-w-md">

            <div class="text-center mb-5">
                <div class="mx-auto h-10 w-10 rounded-xl bg-blue-50 flex items-center justify-center mb-3">
                    <span class="text-blue-700 font-bold text-xl">+</span>
                </div>

                <h1 class="text-2xl font-bold text-gray-900">
                    Criar conta
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    Cadastre um novo acesso para utilizar o sistema administrativo.
                </p>
            </div>

            <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <x-input-label for="name" value="Nome" />

                        <x-text-input
                            id="name"
                            class="block mt-1 w-full"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" value="E-mail" />

                        <x-text-input
                            id="email"
                            class="block mt-1 w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                        />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" value="Senha" />

                        <x-text-input
                            id="password"
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" value="Confirmar senha" />

                        <x-text-input
                            id="password_confirmation"
                            class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="rounded-lg border border-blue-100 bg-blue-50 p-4">
                        <p class="text-sm text-blue-800">
                            Novos usuários cadastrados serão criados como colaboradores.
                            O administrador poderá ajustar permissões posteriormente.
                        </p>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                            Cadastrar
                        </button>
                    </div>

                    <div class="text-center">
                        <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('login') }}">
                            Já possui conta? Entrar
                        </a>
                    </div>
                </form>
            </div>

            <p class="text-center text-sm text-gray-500 mt-6">
                Sistema Administrativo Hospitalar
            </p>
        </div>
    </div>
</x-guest-layout>
