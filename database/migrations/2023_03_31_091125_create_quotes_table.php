<?php
declare(strict_types=1);

use App\Modules\Sale\Domain\Api\QuoteInterface;
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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->timestamp(QuoteInterface::CONVERTED_AT)->nullable();
            $table->smallInteger(QuoteInterface::ITEMS_COUNT);
            $table->smallInteger(QuoteInterface::ITEMS_QTY);
            $table->decimal(QuoteInterface::SUBTOTAL, 10, 2);
            $table->foreignId(QuoteInterface::CUSTOMER_ID)->nullable()->constrained();
            $table->string(QuoteInterface::CUSTOMER_EMAIL)->nullable();
            $table->string(QuoteInterface::CUSTOMER_PHONE)->nullable();
            $table->string(QuoteInterface::CUSTOMER_FIRSTNAME)->nullable();
            $table->string(QuoteInterface::CUSTOMER_LASTNAME)->nullable();
            $table->string(QuoteInterface::CUSTOMER_MIDDLE_NAME)->nullable();
            $table->string(QuoteInterface::CUSTOMER_ADDRESS)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
