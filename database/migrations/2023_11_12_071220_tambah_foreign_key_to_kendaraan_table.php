<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyToKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kendaraan', function (Blueprint $table) {
            $table->foreign('id_pelanggan')
                  ->references('id_pelanggan')
                  ->on('pelanggan')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
            $table->foreign('id_jenis_kendaraan')
                    ->references('id_jenis_kendaraan')
                    ->on('jenis_kendaraan')
                    ->onUpdate('restrict')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kendaraan', function (Blueprint $table) {
            $table->dropForeign('kendaraan_id_pelanggan_foreign');
            $table->dropForeign('kendaraan_id_jenis_kendaraan_foreign');
        });
    }
}
