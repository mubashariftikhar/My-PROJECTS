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
        Schema::create('task1students', function (Blueprint $table) {
            $table->id();
            $table->string('std_name');
            $table->integer('std_age');
            $table->enum('std_status',['1','0'])->nullable();
            $table->date('registered_on');
            $table->date('added_on');
            $table->unsignedBigInteger('std_class')->nullable();

            $table->foreign('std_class')->references('id')->on('class')->onDelete('Cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
