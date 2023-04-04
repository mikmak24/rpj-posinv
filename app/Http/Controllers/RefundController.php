<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\Payment;
use Log;

class RefundController extends Controller
{

    protected $order;
    protected $item;
    protected $orderItem;
    protected $payment;


    public function __construct()
    {
        $this->order =      new Order();
        $this->item =       new Item();
        $this->orderItem =  new OrderItem();
        $this->payment =  new Payment();
    }

    public function create(Request $request) {

    Log::alert('hesuys');
    dd();

        
    }
}
