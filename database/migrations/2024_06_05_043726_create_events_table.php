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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('theme')->nullable();
            $table->string('dateStart');
            $table->string('timeStart')->nullable();
            $table->string('dateEnd')->nullable();
            $table->string('timeEnd')->nullable();
            $table->string('veneu')->nullable();
            $table->string('organizer')->nullable();
            $table->string('maxGuest')->nullable();
            $table->string('about')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
