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

        Schema::create('motor', function (Blueprint $table) {
            $table->id('id_motor');

            $table->string('nama_motor');
            $table->string('merk');
            $table->integer('cc');
            $table->string('warna');
            $table->integer('stock');
            $table->decimal('harga', 15, 2);
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
