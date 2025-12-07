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

        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');

            // Bikin kolom foreign key secara manual
            $table->unsignedBigInteger('id');
            $table->foreign('id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');


            // Bikin kolom foreign key secara manual
            $table->unsignedBigInteger('id_motor');
            $table->foreign('id_motor')
                ->references('id_motor')
                ->on('motor')
                ->onDelete('cascade');

            $table->string('nama_motor');
            $table->string('merk');
            $table->integer('cc');
            $table->string('warna');
            $table->integer('qty');
            $table->decimal('harga',15,2);
            $table->string('gambar')->nullable();
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
