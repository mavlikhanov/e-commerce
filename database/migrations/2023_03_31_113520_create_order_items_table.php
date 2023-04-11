<?php
declare(strict_types=1);

use App\Modules\Sale\Domain\Api\OrderItemInterface;
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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId(OrderItemInterface::ORDER_ID)->constrained();
            $table->foreignId(OrderItemInterface::QUOTE_ITEM_ID)->constrained();
            $table->foreignId(OrderItemInterface::PRODUCT_ID)->constrained();
            $table->smallInteger(OrderItemInterface::QTY);
            $table->decimal(OrderItemInterface::PRICE, 10, 2);
            $table->string(OrderItemInterface::PRODUCT_NAME);
            $table->string(OrderItemInterface::PRODUCT_SKU, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
