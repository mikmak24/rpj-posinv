<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{

    protected $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $categories = Category::all();
        return view('pages/categories')->with('categories', $categories);
    }

    public function create(Request $request)
    {
        $this->category->create($request);
        
        return response()->json([
            'success' => true
        ]);
    }
}
