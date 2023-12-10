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
        Schema::create('r_e_c_s', function (Blueprint $table) {
            $table->id();
            
            $table->decimal('period_production', 10, 6);
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('device_id'); // Foreign key column
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_e_c_s');
    }
};
