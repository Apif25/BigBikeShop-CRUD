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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');


            // Bikin kolom foreign key secara manual
            $table->unsignedBigInteger('id_motor');
            $table->foreign('id_motor')
                ->references('id_motor')
                ->on('motor')
                ->onDelete('cascade');
            $table->string('nama_motor');
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->string('qty');
            $table->decimal('harga', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
