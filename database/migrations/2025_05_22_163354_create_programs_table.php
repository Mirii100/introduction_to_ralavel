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
      Schema::create('programs', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('type'); // e.g., 'bachelor', 'master', 'certificate'
    $table->string('duration');
    $table->integer('credits');
    $table->string('intake'); // e.g., 'Fall', 'Spring'
    $table->string('image'); // image path
    $table->text('description');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
