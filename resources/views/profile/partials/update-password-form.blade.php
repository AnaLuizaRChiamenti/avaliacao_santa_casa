<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Senha atual" />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Nova senha" />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />

            @php
                $passwordErrors = collect($errors->updatePassword->get('password'));
                $confirmationErrors = $passwordErrors->filter(fn ($message) => str_contains($message, 'confirmação'));
                $otherPasswordErrors = $passwordErrors->reject(fn ($message) => str_contains($message, 'confirmação'));
            @endphp

            <x-input-error :messages="$otherPasswordErrors->all()" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Confirmar nova senha" />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            <x-input-error :messages="$confirmationErrors->all()" class="mt-2" />
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
            <x-primary-button>
                Atualizar senha
            </x-primary-button>
        </div>
    </form>
</section>
