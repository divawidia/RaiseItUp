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
        Schema::create('fundraising_phases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fundraising_id')->constrained('fundraisings')->cascadeOnDelete();
            $table->string('name');
            $table->boolean('photo')->default(false);
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraising_phases');
    }
};
