<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
use Log;

class UsersController extends Controller
{

    protected $role;
    protected $user;

    public function __construct()
    {
        $this->user = new User();
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
        $users = $this->user->getAllUsers();
        
        return view('pages/users')->with([
            'users' => $users,
        ]);
    }

    

    
}
