<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_ic')->primary();
            $table->string('student_name');
            $table->integer('student_age');
            $table->string('student_gender');
            $table->string('student_year');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
