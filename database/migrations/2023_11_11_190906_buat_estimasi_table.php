<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatEstimasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimasi', function (Blueprint $table) {
            $table->increments('id_estimasi');
            $table->string('no_plat');
            // $table->unsignedInteger('id_kendaraan');
            $table->integer('nilai_pkb');
            $table->integer('swdkllj');
            $table->timestamp('masa_berlaku_stnk');
            $table->unsignedInteger('id_tipe_pengurusan');
            $table->unsignedInteger('id_wilayah');
            $table->unsignedInteger('id_jenis_kendaraan');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_upping');
            $table->integer('admin_stnk')->default(0);
            $table->integer('admin_tnkb')->default(0);
            $table->integer('biaya_proses')->default(0);
            $table->integer('biaya_admin_pelanggan')->default(0);
            $table->integer('upping')->default(0);
            $table->integer('biaya_estimasi')->default(0);
            $table->string('createdBy')->nullable();
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
        Schema::dropIfExists('estimasi');
    }
}
