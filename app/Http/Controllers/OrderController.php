<?php

namespace App\Http\Controllers;

use App\Notifications\ItemOrdered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function pay(Request $request)
    {
        $itemOrdered = new ItemOrdered($request->get('item'), $request->get('price'));

        Notification::send($request->user(), $itemOrdered);

        return back();
    }
}
