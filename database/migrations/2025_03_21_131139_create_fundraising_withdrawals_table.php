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
        Schema::create('fundraising_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fundraising_id')->constrained('fundraisings')->cascadeOnDelete();
            $table->foreignId('fundraiser_id')->constrained('fundraisers')->cascadeOnDelete();
            $table->boolean('has_received')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraising_withdrawals');
    }
};
