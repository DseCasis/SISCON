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
        Schema::create('civil_vehicle_registration', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string('vehicle_id')->comment("numero de placa vehicular");
            $table->string('color')->comment("color del vehiculo");
            $table->string('observations')->comment("observaciones o descripción");

            $table->foreignId('civilian_personnel')->constrained('civilian_personnel')->comment("conductor actual del vehiculo");
            $table->foreignId('location_id')->constrained('locations')->comment("ubicación donde se realizo el control");
            $table->foreignId('vehicle_brand_id')->constrained('vehicle_brands')->comment("marca del vehiculo");
            $table->foreignId('vehicle_type_id')->constrained('vehicles_types')->comment("tipo de vehiculo");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('civil_vehicle_registration');
    }
};
