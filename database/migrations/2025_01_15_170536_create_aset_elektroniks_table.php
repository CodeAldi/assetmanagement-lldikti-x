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
        Schema::create('aset_elektronik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aset_id')->constrained('aset')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('kerusakan');
            $table->integer('usia');
            $table->integer('freakuensiPemakaian');
            $table->integer('biaya_service');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_elektronik');
    }
};
