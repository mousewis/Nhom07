
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonTable extends Migration
{
    /**
     * Run the migrations.
     * @table hoadon
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->increments('hd_maso');
            $table->string('hd_nguoimua', 64);
            $table->integer('hd_tinhtrang');
            $table->integer('hd_gia');
            $table->date('hd_tgian');
            $table->string('hd_dchi', 256);
            $table->foreign('hd_nguoimua')->references('nd_maso')->on('nguoidung');
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

        Schema::drop('hoadon');
    }
}
