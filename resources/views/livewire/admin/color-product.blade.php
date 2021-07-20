<div>
    <div class="my-12 bg-white shadow-lg rounded-lg p-6">

        {{-- Color --}}
        <div class="mb-6">
            <x-jet-label>
                Color
            </x-jet-label>

            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input type="radio" 
                            name="color_id" 
                            wire:model.defer="color_id"
                            value="{{$color->id}}">
                        <span class="ml-2 text-gray-700 capitalize">
                            {{__($color->name)}}
                        </span>
                    </label>
                @endforeach
            </div>

            <x-jet-input-error for="color_id" />
        </div>

        {{-- Cantidad --}}
        <div>

            <x-jet-label>
                Cantidad
            </x-jet-label>

            <x-jet-input type="number" 
                wire:model.defer="quantity" 
                placeholder="Ingrese una cantidad" 
                class="w-full" />

            <x-jet-input-error for="quantity" />
        </div>

        <div class="flex justify-end items-center mt-4">

            <x-jet-action-message class="mr-3" on="saved">
                Agregado
            </x-jet-action-message>

            <x-jet-button 
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save">
                Agregar
            </x-jet-button>
        </div>

    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <table>
            <thead>
                <tr>
                    <th class="px-4 py-2 w-1/3">
                        Color
                    </th>
                    <th class="px-4 py-2 w-1/3">
                        Cantidad
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($product_colors as $product_color)
                    <tr>
                        <td class="capitalize px-4 py-2">
                            {{__($colors->find($product_color->pivot->color_id)->name)}}
                        </td>
                        <td class="px-4 py-2">
                            {{$product_color->pivot->quantity}} Unidades
                        </td>
                        <td class="px-4 py-2 flex">
                            <x-jet-secondary-button class="ml-auto mr-2">
                                Actualizar
                            </x-jet-secondary-button>

                            <x-jet-danger-button>
                                Eliminar
                            </x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar colores
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>
                    Color
                </x-jet-label>

                <select class="form-control w-full">
                    <option value="">Seleccione un color</option>
                    @foreach ($colors as $color)
                        <option value="{{$color->id}}">{{ucfirst(__($color->name))}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-jet-label>
                    Cantidad
                </x-jet-label>
                <x-jet-input class="w-full" type="number" placeholder="Ingrese una cantidad" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button>
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button>
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
