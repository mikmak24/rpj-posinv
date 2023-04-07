<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
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
            "process_by" =>             auth()->user()->name

        ]);
        $order->save(); // Finally, save the record.
        return $order->id;
    }

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function refund()
    {
        return $this->hasOne(Refund::class);
    }

    public function getAllOrders(){
        return $this::with('payment', 'refund')->orderBy('created_at', 'desc')->get();
    }

    public function getTodayOrdersCount(){
        return  $this::whereDate('order_date', now()->format('Y-m-d'))->count();
    }

    public function getWeeklyOrdersCount(){
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
        return $this::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
    }

    public function totalRevenueToday(){
        return DB::table('orders')
                ->whereDate('created_at', today())
                ->sum('order_total');
    }

    public function totalRevenueThisWeek(){
        return DB::table('orders')
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->sum('order_total');
    }

    public function totalRevenueAllTime(){
        return DB::table('orders')->sum('order_total');

    }


    public function ordersForEachMonthPerYear(){
        // Get the current year
        $year = date('Y');

        // Initialize an array for the order counts
        $orderCounts = array_fill(0, 12, 0);

        // Loop through each month of the current year
        for ($month = 1; $month <= 12; $month++) {
            $orderCount = DB::table('orders')
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();
            $orderCounts[$month - 1] = $orderCount;
        }

        return $orderCounts;

    }
}
