<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(string $slug): View
    {
        $category =Category::query()->where(['slug' => $slug])->firstOrFail()->name;
        $products = Product::query()->with('categories')->whereHas('categories', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();

        return view('page.main', compact('products', 'category'));
    }
}
