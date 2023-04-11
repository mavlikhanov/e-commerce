<?php

use App\Modules\Sale\Domain\Api\OrderInterface;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string(OrderInterface::INCREMENT_ID);
            $table->foreignId(OrderInterface::QUOTE_ID)->constrained();
            $table->string(OrderInterface::STATUS, 50);
            $table->decimal(OrderInterface::TOTAL, 10, 2);
            $table->foreignId(OrderInterface::CUSTOMER_ID)->nullable()->constrained();
            $table->string(OrderInterface::CUSTOMER_EMAIL);
            $table->string(OrderInterface::CUSTOMER_PHONE);
            $table->string(OrderInterface::CUSTOMER_FIRSTNAME);
            $table->string(OrderInterface::CUSTOMER_LASTNAME);
            $table->string(OrderInterface::CUSTOMER_MIDDLE_NAME);
            $table->string(OrderInterface::CUSTOMER_ADDRESS);
            $table->boolean(OrderInterface::CUSTOMER_IS_GUEST)->default(true);
            $table->boolean(OrderInterface::EMAIL_SENT)->default(false);
            $table->timestamps();
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
