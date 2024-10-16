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
        'email',
        'password',
        'username',
    ];

    // Optionally, you can add other user-related properties here
}
