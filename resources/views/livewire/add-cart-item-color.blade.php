<div>
   <p class="text-xl text-gray-700">Color:</p>

   <select class="form-control w-full">
       <option value="" selected disabled>Seleccionar un color</option>
       @foreach ($colors as $color)
           <option value="{{ $color->id }}">{{$color->name}}</option>
       @endforeach
   </select>
</div>
