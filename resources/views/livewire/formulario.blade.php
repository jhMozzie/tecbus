<div>
    <div class="bg-white-shadow rounded-lg p-6">
        <form wire:submit="save">
            <div class="mb-4">
                <x-input-label>Nombre</x-input-label>
                <x-text-input class="w-full" wire:model="title" required />
            </div>
            <div>
                <div class="mb-4">
                    <x-input-label>Contenido</x-input-label>
                    <x-textarea class="w-full" wire:model="content" required></x-textarea>
                </div>
            </div>
            <div class="mb-4">
                <x-input-label>Categoria</x-input-label>
                <x-select wire:model="category_id" class="w-full">
                    <option value="" disabled>Selecciona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-input-label>Etiquetas</x-input-label>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model="selectedTags" value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex justify-end">
                <x-primary-button>
                    Crear
                </x-primary-button>
            </div>
        </form>
    </div>
    <div class="bg-white-shadow rounded-lg p-6">
        <ul class="list-disc list-inside">
            @foreach ($posts as $post)
                <li>
                    {{ $post->title }}
            @endforeach
            </li>
        </ul>
    </div>
</div>
