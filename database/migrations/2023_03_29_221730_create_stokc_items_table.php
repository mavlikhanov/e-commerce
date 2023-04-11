<?php

use App\Models\Contracts\StockItemContract;
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
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId(StockItemContract::PRODUCT_ID)->constrained();
            $table->foreignId(StockItemContract::INVENTORY_SOURCE_ID)->constrained();
            $table->integer(StockItemContract::QTY)->default(0);
            $table->integer(StockItemContract::MIN_QTY)->default(1);
            $table->integer(StockItemContract::MIN_SALE_QTY)->default(1);
            $table->integer(StockItemContract::MAX_SALE_QTY)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_items');
    }
};
