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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('no_polis');
            $table->string('name');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('gender');
            $table->string('pekerjaan');
            $table->string('id_type');
            $table->string('id_number');
            $table->date('issued_date');
            $table->string('issued_state');
            $table->string('issued_authority');
            $table->date('expired_date');
            $table->string('address_type');
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('kecamatan_kelurahan');
            $table->string('rt_rw');
            $table->string('kode_pos');
            $table->string('claim_type');
            $table->date('tanggal_kejadian');
            $table->decimal('nominal_claim', 15, 2);
            $table->text('deskripsi_kejadian');
            $table->json('dokumen_pendukung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
