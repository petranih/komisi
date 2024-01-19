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
        Schema::create('setoran_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nasabahs_id')->constrained();
            $table->foreignId('jenis_tabungans_id')->constrained();
            $table->decimal('jumlah_setoran');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setoran_nasabahs');
    }
};
