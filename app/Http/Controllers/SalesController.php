<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;
use App\Models\Payment;
use App\Models\InventoryAdjustment;
use Carbon\Carbon;
use Log;

class SalesController extends Controller
{

    protected $order;
    protected $item;
    protected $orderItem;
    protected $payment;
    protected $inventoryAdjustment;


    public function __construct(
        InventoryAdjustment $inventoryAdjustment
    )
    {
        $this->order =      new Order();
        $this->item =       new Item();
        $this->orderItem =  new OrderItem();
        $this->payment =  new Payment();
        $this->inventoryAdjustment = $inventoryAdjustment;

    }

    public function index()
    {

        $items =  $this->item->getAllItems();
        return view('pages/sales')->with('items', $items);
    }

    public function create(Request $request) 
    {
        $orderDetails = $request['array2'];
        $itemsOrdered = $request['array1'];
        $order_id = $this->order->create($orderDetails);

        foreach($itemsOrdered as $items){
            $this->orderItem->create($items, $order_id);
        }

        $payment_id = $this->payment->create($orderDetails, $order_id);

        foreach($itemsOrdered as $item) {

            $this->inventoryAdjustment::create([
                'item_id' => $item['item_id'],
                'adjustment_type' => 'out',
                'quantity' => $item['item_quantity'],
                'reason' => 'sales',
                'adjustment_date' => Carbon::now()->timestamp,
                'adjusted_by' => auth()->user()->name
            ]);
    
        }

      
        return response()->json([
            'success' => true
        ]);

        
    }
}
