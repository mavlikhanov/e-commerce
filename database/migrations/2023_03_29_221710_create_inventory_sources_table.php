<?php
declare(strict_types=1);

use App\Models\Contracts\InventorySourceContract;
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
        Schema::create('inventory_sources', function (Blueprint $table) {
            $table->id();
            $table->string(InventorySourceContract::CODE, 4);
            $table->string(InventorySourceContract::NAME);
            $table->string(InventorySourceContract::CONTACT_FULL_NAME);
            $table->string(InventorySourceContract::CONTACT_EMAIL);
            $table->string(InventorySourceContract::CONTACT_PHONE, 11);
            $table->string(InventorySourceContract::ADDRESS);
            $table->string(InventorySourceContract::STATUS, 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_sources');
    }
};
