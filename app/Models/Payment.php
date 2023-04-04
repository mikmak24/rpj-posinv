<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_method',
        'payment_amount',
        'payment_change',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }

    public function create($orderDetails, $order_id){
        // Store the record
        $payment = new $this([
            "order_id" =>               $order_id,
            "payment_method" =>         'Cash',
            "payment_amount" =>         $orderDetails['payment_amount'],
            "payment_change" =>         $orderDetails['payment_change'],
            "status" =>                 'processed'

        ]);
        $payment->save(); // Finally, save the record.
        return $payment->id;
    }

}
