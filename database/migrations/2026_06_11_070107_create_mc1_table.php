<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mc1', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_mc1');
            $table->string('lokasi');
            $table->string('pemohon');
            $table->string('area_pelayanan');
            $table->string('rekanan');
            $table->string('pengawas');
            $table->string('nomor_addendum')->nullable();
            $table->text('keterangan_perubahan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mc1');
    }
};
