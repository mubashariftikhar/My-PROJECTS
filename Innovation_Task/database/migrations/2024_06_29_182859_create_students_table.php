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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->date('dob');
            $table->string('cnic');
            $table->string('phone');
            $table->string('father_cnic');
            $table->text('address');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('stdclass_id')->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();

            $table->foreign('stdclass_id')->references('id')->on('stdclasses')->onDelete('Cascade');
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('Cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
