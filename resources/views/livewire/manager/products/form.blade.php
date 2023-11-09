<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session()->has('success'))
                        <h3>{{ session('success') }}</h3>
                    @endif

                    <div class="block mb-10">
                        <form action="" wire:submit="syncProduct">

                            <div class="w-full mb-5">
                                <label>Nome Produto</label>
                                <input wire:model="form.name" type="text" class="w-full rounded text-black">
                                @error('form.name')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="w-full mb-5">
                                <label>Descrição</label>
                                <input wire:model="form.description" type="text" class="w-full rounded text-black">
                                @error('form.description')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="w-full mb-5">
                                <label>Conteúdo Produto</label>
                                <textarea wire:model="form.body" class="w-full rounded text-black"></textarea>
                                @error('form.body')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="w-full mb-5">
                                <label>Preço</label>
                                <input wire:model="form.price" type="text" class="w-full rounded text-black">
                                @error('form.price')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="w-full mb-6">
                                <label class="w-full mb-4">Categorias</label>

                                <div class="px-5 grid grid-cols-3">
                                    @foreach ($allCategories as $categoryId => $category)
                                        <div>
                                            <input type="checkbox" wire:model.live="categories.{{ $categoryId }}"
                                                value="1"> {{ $category }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button
                                class="px-4 py-2 rounded bg-green-800
                            text-white font-bold text-xl">Salvar</button>
                        </form>
                    </div>


                    @livewire('manager.products.photos.photos')
                </div>
            </div>
        </div>
    </div>
</div>
