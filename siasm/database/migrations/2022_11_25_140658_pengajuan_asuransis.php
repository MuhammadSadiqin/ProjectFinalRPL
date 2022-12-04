<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_asuransis', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('dokumen_asyki');
            $table->string('dokumen_tagihanrs');
            $table->string('kartu_asuransi_pnl');
            $table->string('resume_medis');
            $table->string('hasil_lab');
            $table->string('surat_keterangan_meninggal');
            $table->string('status')->default('sedang diproses');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
