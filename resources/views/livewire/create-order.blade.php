<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value="Nombre de contacto" />
                <x-jet-input type="text" 
                            placeholder="Ingrese el nombre de la persona que recibirá el producto" 
                            class="w-full" />
            </div>

            <div>
                <x-jet-label value="Teléfono de contacto" />
                <x-jet-input type="text" 
                            placeholder="Ingrese un número de teléfono de contacto" 
                            class="w-full" />
            </div>
        </div>

        <div>
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <input type="radio" name="envio" class="text-gray-600">
                <span class="ml-2 text-gray-700">
                    Recoje en tienda (Calle central 123)
                </span>

                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center">
                <input type="radio" name="envio" class="text-gray-600">
                <span class="ml-2 text-gray-700">
                   Envío a domicilio
                </span>
                
            </label>
        </div>
        <div>
            <x-jet-button class="mt-6 mb-4">
                Continuar con la compra
            </x-jet-button>
        </div>

        <hr>

        <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis impedit iste quam eum vero iure, necessitatibus dolorum, incidunt suscipit labore blanditiis excepturi cupiditate officiis fugiat repellat. Unde, quam excepturi? Animi. <a href="" class="font-semibold text-orange-500">Políticas y privacidad</a></p>

    </div>

    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>
                            
                            <div class="flex">
                                <p>Cant: {{$item->qty}}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{__($item->options['color'])}}</p>
                                @endisset

                                @isset($item->options['size'])
                                    <p>{{($item->options['size'])}}</p>
                                @endisset
                            </div>
                            
                            <p>USD {{$item->price}}</p>
                        </article>
                    </li>
                    
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{ Cart::subtotal() }} USD</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío
                    <span class="font-semibold">Gratis</span>
                </p>

                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    {{ Cart::subtotal() }} USD
                </p>
            </div>
        </div>
    </div>
</div>
