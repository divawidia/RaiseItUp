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
            $table->string('proof')->nullable();
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_account_name');
            $table->unsignedBigInteger('amount_requested');
            $table->unsignedBigInteger('amount_received')->nullable();
            $table->boolean('has_received')->default(false);
            $table->boolean('has_sent')->default(false);
            $table->softDeletes();
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
