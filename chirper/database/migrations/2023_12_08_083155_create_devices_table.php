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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();

            $table->string('registry_name');
            $table->string('registry_id')->unique();
            $table->decimal('capacity_mw', 10, 2);
            $table->string('fuel_type');
            $table->string('country');
            $table->string('province')->nullable();
            $table->string('registry');
            $table->boolean('connected_to_grid');
            $table->boolean('feed_in_tariff');
            $table->decimal('percentage_renewable', 5, 2);
            $table->string('labelling_schemes')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->date('registration_date');
            $table->date('commission_date');
            $table->string('address_local')->nullable();
            $table->string('address_english');
            $table->string('device_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
