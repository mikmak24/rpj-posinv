<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SalesController extends Controller
{

    protected $item;
    public function __construct()
    {
        $this->item = new Item();
    }

    public function index(){

        $items =  $this->item->getAllItems();
        return view('pages/sales')->with('items', $items);

    }
}
