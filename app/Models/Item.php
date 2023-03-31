<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code',
        'item_name',
        'item_description',
        'item_price',
        'item_quantity',
        'item_status',
        'item_image',
        'category_id'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function create($request){
        // Store the record
        $item = new $this([
            "item_code" =>          $request->code,
            "item_name" =>          $request->item_name,
            "item_description" =>   $request->item_description,
            "item_price" =>         $request->item_price,
            "item_quantity" =>      $request->item_quantity,
            "item_status" =>        $request->item_status,
            "item_image" =>         $request->file_name,
            "category_id" =>        $request->item_category
        ]);
        $item->save(); // Finally, save the record.
    }

    public static function generateCode()
    {
        $code = 'ITEM' . mt_rand(100000, 999999); // Generate a random 6-digit number

        // Check if the code already exists
        if (self::where('item_code', $code)->exists()) {
            // If it does, generate a new code
            return self::generateCode();
        }

        return $code;
    }

    public function getAllItems(){
        $items = $this::all();
        return $items;
    }

}
