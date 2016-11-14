
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDienthoaiTable extends Migration
{
    /**
     * Run the migrations.
     * @table dienthoai
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dienthoai', function (Blueprint $table) {
            $table->increments('dt_maso');
            $table->string('dt_ten', 256);
            $table->string('dt_hdn', 64);
            $table->integer('dt_sluong');
            $table->string('dt_thuonghieu', 64);
            $table->integer('dt_gia');
            $table->string('dt_hinh', 256);
            $table->string('dt_loai', 256);
            $table->string('dt_kco', 256);
            $table->string('dt_pgiai', 256);
            $table->string('dt_pin', 256);
            $table->string('dt_hdh', 256);
            $table->string('dt_ram', 256);
            $table->string('dt_bnho', 256);
            $table->string('dt_cam', 256);
            $table->foreign('dt_hdn')->references('hdn_maso')->on('hoadonnhap');
            $table->foreign('dt_thuonghieu')->references('th_maso')->on('thuonghieu');
            # Indexes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('dienthoai');
    }
}
