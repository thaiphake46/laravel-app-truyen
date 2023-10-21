<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'user_id',
        'category_id',
    ];
}
