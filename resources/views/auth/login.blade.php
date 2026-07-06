<x-guest-layout>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-6">
        <div class="w-full max-w-md">

            <div class="text-center mb-8">
                <div class="mx-auto h-12 w-12 rounded-xl bg-blue-50 flex items-center justify-center mb-3">
                    <span class="text-blue-700 font-bold text-lg">SC</span>
                </div>

                <h1 class="text-2xl font-bold text-gray-900">
                    Acessar sistema
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    Entre com seu e-mail e senha para acessar o painel administrativo.
                </p>
            </div>

            <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-8">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <x-input-label for="email" value="E-mail" />

                        <x-text-input
                            id="email"
                            class="block mt-1 w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
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
                            autocomplete="current-password"
                        />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                name="remember"
                            >

                            <span class="ms-2 text-sm text-gray-600">
                                Lembrar acesso
                            </span>
                        </label>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>

            <p class="text-center text-sm text-gray-500 mt-6">
                Sistema Administrativo Hospitalar
            </p>
        </div>
    </div>
</x-guest-layout>
