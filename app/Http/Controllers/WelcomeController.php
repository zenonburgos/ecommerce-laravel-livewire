<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        if (auth()->user()) {

            $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();

            if ($pendiente) {

                $mensaje = "Tiene $pendiente órdenes pendientes. <a class='font-bold' href='".route('orders.index')."?status=1'>Ir a caja</>";

                session()->flash('flash.banner', $mensaje);
            }
            
        }

        $categories = Category::all();

        return view('welcome', compact('categories'));
    }
}
