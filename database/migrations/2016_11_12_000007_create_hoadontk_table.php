
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadontkTable extends Migration
{
    /**
     * Run the migrations.
     * @table hoadontk
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadontk', function (Blueprint $table) {
            $table->increments('hdtk_maso');
            $table->string('hdtk_nguoidung', 64);
            $table->date('hdtk_tgian');
            $table->integer('hdtk_gia');
            $table->foreign('hdtk_nguoidung')->references('nd_maso')->on('nguoidung');
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

        Schema::drop('hoadontk');
    }
}
