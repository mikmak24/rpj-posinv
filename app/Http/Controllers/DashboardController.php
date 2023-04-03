<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Log;

class DashboardController extends Controller
{
    protected $orders;
    protected $orderItem;

    public function __construct()
    {
        $this->orders = new Order();
        $this->orderItem = new OrderItem();
    }


    public function index()
    {
        $todayOrderCount = $this->orders->getTodayOrdersCount();
        $weeklyOrderCount = $this->orders->getWeeklyOrdersCount();
        $mostSoldItems = $this->orderItem->getMostSoldItems();
        $totalRevenueThisWeek = $this->orders->totalRevenueThisWeek();
        $totalRevenueToday = $this->orders->totalRevenueToday();
        $totalRevenueAllTime = $this->orders->totalRevenueAllTime();
        $orderByMonthPerYear = $this->orders->ordersForEachMonthPerYear();

        Log::alert($orderByMonthPerYear);

        return view('dashboard.index', compact(
            'todayOrderCount',
            'weeklyOrderCount',
            'mostSoldItems',
            'totalRevenueThisWeek',
            'totalRevenueToday',
            'totalRevenueAllTime'
        ));

    }
}
