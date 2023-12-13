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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('service_day', ['Lunes a Viernes']);
            $table->string('departure_time');
            $table->enum('turn', ['Mañana', 'Tarde', 'Noche']);
            $table->enum('direction', ['Paradero Inicial a Tecsup', 'Tecsup a Paradero Final']);
            $table->string('image')->nullable()->default(null);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
