<div>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-12">
        <div>
            <x-jet-label>
                Cantidad
            </x-jet-label>

            <x-jet-input wire:model="name" type="text" placeholder="Ingrese una talla" class="w-full" />

            <x-jet-input-error for="name" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <x-jet-button wire:click="save" wire:loading.attr="disable" wire:target="save">
                Agregar
            </x-jet-button>
        </div>
    </div>

    <ul class="mt-12 space-y-4">
        @foreach ($sizes as $size)
            <li class="bg-white shadow-lg rounded-lg p-6" wire:key="size-{{$size->id}}">
                <span class="text-xl font-medium">{{$size->name}}</span>
            </li>
        @endforeach
    </ul>
</div>
