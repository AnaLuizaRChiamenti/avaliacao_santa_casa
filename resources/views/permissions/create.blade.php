<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nova Permissão</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">

            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf

                <div>
                    <label>Nome</label><br>
                    <input type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <br>

                <div>
                    <label>Slug</label><br>
                    <input type="text" name="slug" value="{{ old('slug') }}">
                    @error('slug')
                        <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <br>

                <button type="submit">Salvar</button>
                <a href="{{ route('permissions.index') }}">Voltar</a>
            </form>

        </div>
    </div>
</x-app-layout>
