@props(['category'])

<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-trueGray-500 mb-3">Subcategorías</p>

        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="" class="text-trueGray-500 inline-block font-semibold py-1 px-4 hover:text-orange-500">
                        {{ $subcategory->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{asset('storage/'. $category->image )}}" alt="">
        {{-- <img class="h-64 w-full object-cover object-center" src="{{Storage::url($categories->first()->image)}}" alt=""> --}}
        {{-- {{ asset("storage/imgHabitaciones/$hab->hab_urlimg" )}} --}}
    </div>
</div>