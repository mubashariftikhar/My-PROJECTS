<?php
// database/migrations/2023_06_07_000000_create_hospitals_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('official_email')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('sub_super_admin_id')->nullable();
            $table->integer('number_of_beds')->nullable();
            $table->integer('number_of_staff')->nullable();
            $table->date('established_at')->nullable();
            $table->string('white_logo')->nullable();
            $table->string('dark_logo')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('sub_super_admin_id')->references('id')->on('users')->onDelete('cascade');

            // Auditing fields
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // Foreign key constraints for auditing
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
