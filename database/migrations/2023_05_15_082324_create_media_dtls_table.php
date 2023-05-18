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
        Schema::create('media_dtls', function (Blueprint $table) {
            $table->char('medium_dtl_id', 36)->primary();
            $table->string('medium_dtl_name', 32)->unique();
            $table->char('medium_id', 36);
            $table->timestamps();

            $table->foreign('medium_id')->references('medium_id')->on('media')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_dtls');
    }
};
