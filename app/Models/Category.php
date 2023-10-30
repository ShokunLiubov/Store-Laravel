<?php

namespace App\Models;

use App\Enum\Category\Category as Categories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => Categories::class
    ];

    protected $guarded = [];
}
