<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Log;

class ItemController extends Controller
{
    protected $item;
    public function __construct()
    {
        $this->item = new Item();
    }

    public function create(Request $request)
    {
        // ensure the request has a file before we attempt anything else.
        $itemCode = $this->item::generateCode(); // Generate a new item code
        if ($request->hasFile('item_image')) {
            // Get the uploaded file
            $file = $request->file('item_image');

            // Generate a unique filename for the file
            $filename = $itemCode . '.' . $file->getClientOriginalExtension();

            // Store the file in the public disk
            $file->storeAs('public/images', $filename);

            $request->request->add(['file_name' => $filename]); //add request
            $request->request->add(['code' => $itemCode]); //add request

        }

        $this->item->create($request);
        
        return response()->json([
            'success' => true
        ]);
    }

    public function index(){
        $items = Item::all();
        return view('pages/items')->with('items', $items);

    }

    
}
