<?php

namespace App\Models;

use App\Enum\Category\Category as Categories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => Categories::class
    ];

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    public function getNameAttribute($value): string
    {
        return (string)$value;
    }
}
