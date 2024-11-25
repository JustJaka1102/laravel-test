<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    protected $fillable = [
        'email',
        'user_name',
        'birthday',
        'first_name',
        'last_name',
        'password',
        'reset_password',
        'status',
        'flag_delete',
    ];
}
