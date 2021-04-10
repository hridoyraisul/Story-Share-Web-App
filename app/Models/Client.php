<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'password',
        'gender',
        'dob',
        'status',
        'dp'
    ];
}
