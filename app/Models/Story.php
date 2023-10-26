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

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }

    public function latestChapter()
    {
        return $this->hasOne(Chapter::class)->latest();
    }
}
