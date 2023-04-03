<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;
use Log;


class OrdersController extends Controller
{
    protected $item;
    protected $order;

    public function __construct()
    {
        $this->item =  new Item();
        $this->order =  new Order();


    }

    public function index(){
        $orders = $this->order->getAllOrders();
        return view('pages/orders')->with('orders', $orders);
    }

}
