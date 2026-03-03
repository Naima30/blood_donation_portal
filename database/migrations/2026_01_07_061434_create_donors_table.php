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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            
            $table->integer('age');
            $table->string('blood_group');
            $table->string('alcohol')->nullable();
            $table->string('sugar_level')->nullable();
            $table->text('medical_info')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            if (!Schema::hasColumn('donors', 'user_id')) {
        $table->unsignedBigInteger('user_id');
    }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
