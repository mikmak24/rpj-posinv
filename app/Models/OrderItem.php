<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use DB;

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
        $item = new Item();
        $item->inventoryMovement( $items['item_code'], $items['item_quantity'], 'subtract');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }




    public function getMostSoldItems(){

        return DB::table('order_items')
                ->join('items', 'order_items.item_code', '=', 'items.item_code')
                ->select('items.item_name', 'order_items.item_code', DB::raw('count(*) as total_orders'))
                ->groupBy('items.item_name', 'order_items.item_code')
                ->orderBy('total_orders', 'desc')
                ->limit(10)
                ->get();

    }

}
