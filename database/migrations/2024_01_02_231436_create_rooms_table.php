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
        if (!Schema::hasTable('rooms')) {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_type_id')->constrained('room_types');
            $table->string('total_adult')->nullable();
            $table->string('total_child')->nullable();
            $table->string('room_capacity')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('size')->nullable();
            $table->string('view')->nullable();
            $table->string('bed_style')->nullable();
            $table->integer('discount')->default(0);
            $table->string('short_desc')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
