<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\InventoryAdjustment;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Log;

class ItemController extends Controller
{
    protected $item;
    protected $category;
    protected $inventoryAdjustment;

    public function __construct(
        InventoryAdjustment $inventoryAdjustment
    )
    {
        $this->item = new Item();
        $this->category = new Category();
        $this->inventoryAdjustment = $inventoryAdjustment;

    }

    public function create(Request $request)
    {
        try {
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

        }

        $request->request->add(['code' => $itemCode]); //add request

        $this->item->create($request);
        
        return response()->json([
            'success' => true
        ]);

        }catch(\Exception $e){
            Log::alert($e);
        }
    }

    public function index(){
        $items = $this->item->getAllItems();
        $categories = $this->category->getAllCategories();
        return view('pages/items')->with([
            'items' => $items,
            'categories' => $categories
        ]);
    }

    public function edit($id){
        $item = $this->item::with('category')->find($id);
        $categories = $this->category->getAllCategories();
        $adjustments = $this->inventoryAdjustment::where('item_id', $id)
        ->orderBy('adjustment_date', 'desc')
        ->paginate(10);

        return view('pages/items/edit')->with([
            'item' => $item,
            'categories' => $categories,
            'adjustments' => $adjustments
        ]);    
    }

    public function update(Request $request){

        if($request->prev_item_quantity > $request->item_quantity){
            $adjustment_type = 'out';
        } else if ($request->prev_item_quantity < $request->item_quantity) {
            $adjustment_type = 'in';
        } else {
            $adjustment_type = '--';
        }

        $this->item::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                "item_name" => $request->item_name,
                "item_description" => $request->item_description,
                "item_price" => $request->item_price,
                "item_quantity" => $request->item_quantity,
                "item_status" => $request->item_status,
                "item_category" => $request->item_category,
                "item_unit" => $request->item_unit
            ]
        );

        
        $this->inventoryAdjustment::create([
            'item_id' => $request->id,
            'adjustment_type' => $adjustment_type,
            'quantity' => $request->item_quantity,
            'reason' => 'modify',
            'adjustment_date' => Carbon::now()->timestamp,
            'adjusted_by' => auth()->user()->name
        ]);

        return back();
    }


   


    

    
}
