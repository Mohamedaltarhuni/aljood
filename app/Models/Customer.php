<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable

{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    protected $guard = 'Customer';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'password',
        'address',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
