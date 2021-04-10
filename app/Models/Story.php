<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'stories';
    protected $fillable = [
        'id',
        'client_id',
        'title',
        'body',
        'picture',
        'picture_caption',
        'tag',
        'reaction',
    ];
    protected $casts = [
        'tag'=> 'array'
    ];
}
