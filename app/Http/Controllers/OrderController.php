<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class OrderController extends Controller
{
    public function payment(Order $order){

        $items = json_decode($order->content);

        return view('orders.payment', compact('order', 'items'));
    }
}
