<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'role_name',
        'role_description'
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function create($request){
        // Store the record
        $role = new $this([
            "role_name" =>          $request->role_name,
            "role_description" =>   $request->role_description
            
        ]);
        $role->save(); // Finally, save the record.
    }

    public function getAllRoles(){
        return $this::get();
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
