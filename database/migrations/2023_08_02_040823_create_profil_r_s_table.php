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
        Schema::create('profil_rs', function (Blueprint $table) {
            $table->id();
            $table->string('sejarah')->nullable();
            $table->string('visi')->nullable();
            $table->string('misi')->nullable();
            $table->string('moto')->nullable();
            $table->string('slogan')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_r_s');
    }
};
