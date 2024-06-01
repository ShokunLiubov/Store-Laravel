<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->using(ProductCategory::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->using(ProductCategory::class);
    }

}
