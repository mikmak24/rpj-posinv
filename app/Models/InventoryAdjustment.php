<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryAdjustment extends Model
{
    protected $fillable = [
        'item_id',
        'adjustment_type',
        'quantity',
        'reason',
        'adjustment_date',
        'adjusted_by'
    ];

    protected $dates = ['adjustment_date', 'created_at', 'updated_at'];

    // Define the relationship with the items table
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}

