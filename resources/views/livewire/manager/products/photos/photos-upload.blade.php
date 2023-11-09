<div>
    <form action="" wire:submit="savePhotos">
        <div class="w-full">
            <label>Foto</label>

            <input type="file" wire:model="photos" multiple class="w-full border border-gray-400 rounded p-4 mb-10">

            <div class="w-full my-10">
                @error('photos.*')
                    {{ $message }}
                @enderror
            </div>

            <button class="px-4 py-2 rounded bg-green-800
            text-white font-bold text-xl">
                Salvar Fotos
            </button>
        </div>
    </form>

    <div class="grid grid-cols-4 gap-6">
        @if ($photos)
            @foreach ($photos as $photo)
                <img src="{{ $photo->temporaryUrl() }}" class="w-48 h-48 p-2 bg-white border border-gray-400 rounded">
            @endforeach
        @endif
    </div>
</div>
