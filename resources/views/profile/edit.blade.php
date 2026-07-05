<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meu Perfil
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Atualize seus dados pessoais e sua senha de acesso.
            </p>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white border border-gray-100 shadow-sm rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Informações do perfil
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Altere seu nome e e-mail de acesso.
                    </p>
                </div>

                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white border border-gray-100 shadow-sm rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Alterar senha
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Use uma senha segura para proteger sua conta.
                    </p>
                </div>

                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
