<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Change this
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Change this
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'role',
        'password',
    ];

    public function hasRole($role)
    {
        return $this->role == $role;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
