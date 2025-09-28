<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
$table->string('name');
$table->string('sku')->unique();
$table->foreignId('category_id')->constrained('categories');
$table->foreignId('sub_category_id')->nullable()->constrained('categories');
$table->foreignId('sub_sub_category_id')->nullable()->constrained('categories');
$table->decimal('price', 10, 2);
$table->decimal('discount_price', 10, 2)->nullable();
$table->integer('stock')->default(0);
$table->text('description')->nullable();
$table->json('variants')->nullable(); // Color-size-image mapping
$table->json('product_details')->nullable();
$table->json('delivery_returns')->nullable();
$table->json('images')->nullable(); // <-- added
$table->enum('status', ['Active', 'Inactive'])->default('Active');

$table->string('material')->nullable();
$table->string('care')->nullable();
$table->string('delivery_time')->nullable();
$table->string('return_policy')->nullable();

$table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
