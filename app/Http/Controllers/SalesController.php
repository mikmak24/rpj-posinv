<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\Payment;
use Log;

class SalesController extends Controller
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

    public function index(){

        $items =  $this->item->getAllItems();
        return view('pages/sales')->with('items', $items);
    }

    public function create(Request $request) {

        $orderDetails = $request['array2'];
        $itemsOrdered = $request['array1'];

        $order_id = $this->order->create($orderDetails);

        foreach($itemsOrdered as $items){
            $this->orderItem->create($items, $order_id);
        }

        $payment_id = $this->payment->create($orderDetails, $order_id);

        return response()->json([
            'success' => true
        ]);

        
    }
}
