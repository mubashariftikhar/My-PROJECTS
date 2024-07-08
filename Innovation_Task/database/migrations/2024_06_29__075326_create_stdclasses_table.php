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
    
            Schema::create('stdclasses', function (Blueprint $table) {
                $table->id();
                $table->string('class_name');
                $table->boolean('class_status')->default(0);
                $table->timestamps();
            });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stdclasses');
    }
};
