<?php

use App\Modules\Catalog\Application\Models\Eloquent\CategoryInterface;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string(CategoryInterface::NAME);
            $table->string(CategoryInterface::SLUG);
            $table->string(CategoryInterface::H1)->nullable();
            $table->string(CategoryInterface::SEO_TITLE)->nullable();
            $table->text(CategoryInterface::SEO_KEYWORDS)->nullable();
            $table->text(CategoryInterface::SEO_DESCRIPTION)->nullable();
            $table->text(CategoryInterface::SEO_TEXT)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
