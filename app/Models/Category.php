<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'category_description',
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function create($request){
        // Store the record
        $category = new $this([
            "category_name" =>          $request->category_name,
            "category_description" =>   $request->category_description
        ]);
        $category->save(); // Finally, save the record.
    }

}
