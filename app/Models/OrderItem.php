<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'item_code',
        'item_name',
        'item_price',
        'item_discount',
        'item_quantity',
        'total',
    ];


    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function create($items, $order_id){
        
        // Store the record
        $order = new $this([
            "order_id" =>              $order_id,
            "item_code" =>             $items['item_code'],
            "item_name" =>             $items['item_name'],
            "item_price" =>            $items['item_price'],
            "item_discount" =>         $items['item_discount'],
            "item_quantity" =>         $items['item_quantity'],
            "total" =>                 $items['item_total'],
        ]);
        $order->save(); // Finally, save the record.
    }
}
