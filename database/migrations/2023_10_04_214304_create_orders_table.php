<?php

use App\Enum\Order\OrderStatus;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('status', OrderStatus::values())->default(OrderStatus::PENDING);
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->integer('total');
            $table->foreignIdFor(Delivery::class)->constrained()->onDelete('cascade');
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('address', 128);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
