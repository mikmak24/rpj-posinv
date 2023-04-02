<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class OrdersController extends Controller
{
    protected $item;

    public function __construct()
    {
        $this->item =  new Item();

    }

    public function index(){
        $items = Item::all();
        return view('pages/orders')->with('items', $items);
    }

}
