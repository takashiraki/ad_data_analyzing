<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lp_remarks', function (Blueprint $table) {
            $table->char('lp_id', 36)->primary();
            $table->string('lp_remark', 256);
            $table->timestamps();

            $table->foreign('lp_id')->references('lp_id')->on('lps')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lp_remarks');
    }
};
