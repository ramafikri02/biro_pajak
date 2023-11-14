<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyToEstimasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estimasi', function (Blueprint $table) {
            // $table->foreign('id_kendaraan')
            //       ->references('id_kendaraan')
            //       ->on('kendaraan')
            //       ->onUpdate('restrict')
            //       ->onDelete('restrict');
            $table->foreign('id_tipe_pengurusan')
                  ->references('id_tipe_pengurusan')
                  ->on('tipe_pengurusan')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
            $table->foreign('id_wilayah')
                  ->references('id_wilayah')
                  ->on('wilayah')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
            $table->foreign('id_pelanggan')
                  ->references('id_pelanggan')
                  ->on('pelanggan')
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
        Schema::table('estimasi', function (Blueprint $table) {
            // $table->dropForeign('estimasi_id_kendaraan_foreign');
            $table->dropForeign('estimasi_id_tipe_pengurusan_foreign');
            $table->dropForeign('estimasi_id_wilayah_foreign');
            $table->dropForeign('estimasi_id_pelanggan_foreign');
        });
    }
}
