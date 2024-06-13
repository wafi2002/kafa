<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('studentIC');
            $table->foreign('studentIC')->references('studentIC')->on('students')->onDelete('cascade');
            $table->string('studentName');
            $table->string('subjectName');
            $table->integer('resultMark');
            $table->string('grade');
            $table->timestamps();

            // Add foreign key constraint

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
}
