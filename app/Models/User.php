<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Str;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'phone',
        'about',
        'password_confirmation',
        'role_id',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getAllUsers()
    {
        return $this::with('role')->get();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function create($request){
        // Store the record
        $user = new $this([
            "name" =>           $request->name,
            "email" =>          $request->email,
            "password" =>       $request->password,
            "location" =>       $request->location,
            "phone" =>          $request->phone,
            "role_id" =>        $request->role,
            "remember_token" => Str::random(60),
            "email_verified_at" => Carbon::now()

        ]);
        $user->save(); // Finally, save the record.
    }

}
