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
        Schema::create('post_mortems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->onDelete('cascade');
            $table->string('post_description');
            $table->date('post_date');
            $table->string('post_status');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_mortems');
    }
};
