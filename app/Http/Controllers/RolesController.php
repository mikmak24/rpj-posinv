<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Role;

use Illuminate\Support\Facades\Storage;
use Log;

class RolesController extends Controller
{
    protected $item;
    protected $category;
    protected $role;

    public function __construct()
    {
        $this->item = new Item();
        $this->category = new Category();
        $this->role = new Role();
    }

    public function create(Request $request)
    {
        $this->role->create($request);

        return response()->json([
            'success' => true
        ]);



    }

    public function index(){
        $roles = $this->role->getAllRoles();
        return view('pages/roles')->with([
            'roles' => $roles,
        ]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $this->role::where('id', $id)->delete();
        return back();
    }

    

    
}
