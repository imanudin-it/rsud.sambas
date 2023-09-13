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
        Schema::table('profil_rs', function (Blueprint $table) {
            $table->text('sejarah')->change();
            $table->text('visi')->change();
            $table->text('misi')->change();
            $table->text('moto')->change();
            $table->text('slogan')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_rs', function (Blueprint $table) {
            //
        });
    }
};
