<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pin_location', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('catatan');
            $table->string('kordinat');
            $table->string('kelurahan');
            $table->string('tipe');
            $table->string('user_id');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pin_location');
    }
}
