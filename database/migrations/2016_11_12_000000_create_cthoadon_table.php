
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCthoadonTable extends Migration
{
    /**
     * Run the migrations.
     * @table cthoadon
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthoadon', function (Blueprint $table) {
            $table->integer('cthd_maso');
            $table->string('cthd_sanpham', 64);
            $table->integer('cthd_soluong');
            $table->integer('cthd_gia');
            $table->integer('cthd_tinhtrang');
            $table->foreign('cthd_maso')->references('hd_maso')->on('hoadon');
            $table->foreign('cthd_sanpham')->references('dt_maso')->on('dienthoai');
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

        Schema::drop('cthoadon');
    }
}
