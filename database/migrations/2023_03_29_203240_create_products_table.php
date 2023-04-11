<?php

use App\Modules\Catalog\Application\Models\Eloquent\ProductInterface;
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
            $table->string(ProductInterface::NAME);
            $table->string(ProductInterface::SLUG);
            $table->string(ProductInterface::SKU, 6)->unique();
            $table->text(ProductInterface::DESCRIPTION);
            $table->decimal(ProductInterface::PRICE, 10, 2);
            $table->decimal(ProductInterface::SPECIAL_PRICE, 10, 2)->nullable();
            $table->string(ProductInterface::PHOTO);
            $table->foreignId(ProductInterface::CATEGORY_ID)->constrained();
            $table->string(ProductInterface::H1)->nullable();
            $table->string(ProductInterface::SEO_TITLE)->nullable();
            $table->text(ProductInterface::SEO_KEYWORDS)->nullable();
            $table->text(ProductInterface::SEO_DESCRIPTION)->nullable();
            $table->text(ProductInterface::SEO_TEXT)->nullable();
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
