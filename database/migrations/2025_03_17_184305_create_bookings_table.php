<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->onDelete('cascade'); // Car reference
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('pickup_date');
            $table->date('dropoff_date');
            $table->foreignId('route_id')->nullable()->constrained('taxi_routes')->onDelete('set null'); // Optional route
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('bookings');
    }
};
