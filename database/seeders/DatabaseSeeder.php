<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\User;
use Database\Factories\CategoryFactory;
use Database\Factories\DeliveryFactory;
use Database\Factories\OrderItemFactory;
use Database\Factories\ProductCategoryFactory;
use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RoleFactory::createRoles();
        User::factory(10)->create();
        Product::factory(20)->create();
        CategoryFactory::createCategories();
        ProductCategoryFactory::createProductCategory();
        DeliveryFactory::createDeliveries();
        Order::factory(40)->create();
        OrderItemFactory::createOrderItems();
    }
}
