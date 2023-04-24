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
        Schema::create('medium', function (Blueprint $table) {
            $table->char('medium_id', 36);
            $table->char('medium_name', 32)->unique();
            $table->dateTime('add_medium_day', $precision = 0);
            $table->dateTime('last_medium_edit_day', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medium');
    }
};
