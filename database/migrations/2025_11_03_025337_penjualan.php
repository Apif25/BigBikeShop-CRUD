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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');

            // Bikin kolom foreign key secara manual
            $table->unsignedBigInteger('id_motor');
            $table->foreign('id_motor')
                ->references('id_motor')
                ->on('motor')
                ->onDelete('cascade');

            $table->string('nama_motor');
            $table->string('harga');
            $table->string('qty');
            $table->string('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
