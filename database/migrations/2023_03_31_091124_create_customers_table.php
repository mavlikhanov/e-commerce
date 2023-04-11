<?php

use App\Modules\Customer\Application\Models\Eloquent\CustomerInterface;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string(CustomerInterface::NAME);
            $table->string(CustomerInterface::EMAIL)->unique();
            $table->string(CustomerInterface::PASSWORD);
            $table->string(CustomerInterface::PHONE, 11);
            $table->string(CustomerInterface::ADDRESS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
