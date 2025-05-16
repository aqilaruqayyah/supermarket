<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaToPembelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembelis', function (Blueprint $table) {
            $table->string('nama'); // Menambahkan kolom nama
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelis', function (Blueprint $table) {
            $table->dropColumn('nama'); // Menghapus kolom nama jika rollback
        });
    }
}
