<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('administration_sections', function (Blueprint $table) {
        $table->id();
        $table->string('subtitle')->nullable();
        $table->string('heading')->nullable();
        $table->text('description')->nullable();
        $table->integer('years_of_excellence')->default(0);
        $table->integer('faculty_members')->default(0);
        $table->integer('student_success')->default(0);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('administration_sections');
}

};
