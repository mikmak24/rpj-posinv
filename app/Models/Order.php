<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'order_discount',
        'order_date',
        'order_total',
        'payment_method',
        'payment_amount',
        'payment_change',
        'process_by'
    ];


    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function create($orderDetails){
        // Store the record
        $order = new $this([
            "order_no" =>               $orderDetails['order_no'],
            "order_discount" =>         $orderDetails['order_discount'],
            "order_date" =>             $orderDetails['order_date'],
            "order_total" =>            $orderDetails['order_total'],
            "payment_method" =>         'Cash',
            "payment_amount" =>         $orderDetails['payment_amount'],
            "payment_change" =>         $orderDetails['payment_change'],
            "process_by" =>             auth()->user()->name

        ]);
        $order->save(); // Finally, save the record.
        return $order->id;
    }
}
