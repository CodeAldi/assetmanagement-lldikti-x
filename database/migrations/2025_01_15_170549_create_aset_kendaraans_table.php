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
        Schema::create('aset_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aset_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('kerusakan');
            $table->integer('usia');
            $table->integer('jarak_tempuh');
            $table->integer('biaya_perawatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_kendaraan');
    }
};
