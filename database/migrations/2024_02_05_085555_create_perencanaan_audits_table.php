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
        Schema::create('perencanaan_audits', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan_audit', 50);
            $table->string('ruang_lingkup', 50);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('tim_audit', 100);
            $table->string('sumber_daya', 100);
            $table->string('teknik_audit', 50);
            $table->string('status', 50);
            $table->string('catatan', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perencanaan_audits');
    }
};
