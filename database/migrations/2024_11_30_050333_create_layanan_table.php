<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->id(); // Membuat kolom ID sebagai primary key
            $table->string('type'); // Kolom type dengan tipe data string
            $table->text('data'); // Kolom data dengan tipe data text
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Membatalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan');
    }
}
