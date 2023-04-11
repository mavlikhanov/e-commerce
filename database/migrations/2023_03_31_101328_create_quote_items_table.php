<?php

use App\Modules\Sale\Domain\Api\QuoteItemInterface;
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
        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId(QuoteItemInterface::QUOTE_ID)->constrained();
            $table->foreignId(QuoteItemInterface::PRODUCT_ID)->constrained();
            $table->smallInteger(QuoteItemInterface::QTY);
            $table->decimal(QuoteItemInterface::PRICE, 10, 2);
            $table->string(QuoteItemInterface::PRODUCT_NAME);
            $table->string(QuoteItemInterface::PRODUCT_SKU, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_items');
    }
};
