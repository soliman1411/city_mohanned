<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // إحداثيات المكان
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
$table->foreignId('land_id')->constrained('lands')->onDelete('cascade');

           // $table->unsignedBigInteger('land_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
