<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function isAdmin():bool
    {
        return $this->hasRole('admin');
    }
    public function isUser():bool
    {
        return $this->hasRole('user');
    }
    public function isEditor():bool
    {
        return $this->hasRole('editor');
    }
    public function hasRole(string $role):bool
    {
        return $this->getAttribute('role')===$role;
    }
    public function getRedirectRoute()
{
    if ($this->isEditor()) {
        return ('editor_dashboard');
    } else if ($this->isAdmin()) {
        return ('admin_dashboard');
    }

    // Check if the 'dashboard' route is defined before falling back to HOME


    return RouteServiceProvider::HOME;
}

}
