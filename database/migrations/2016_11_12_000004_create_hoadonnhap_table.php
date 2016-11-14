
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonnhapTable extends Migration
{
    /**
     * Run the migrations.
     * @table hoadonnhap
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonnhap', function (Blueprint $table) {
            $table->increments('hdn_maso');
            $table->string('hdn_nguoidung', 64);
            $table->date('hdn_tgian');
            $table->integer('hdn_gia');
            $table->foreign('hdn_nguoidung')->references('nd_maso')->on('nguoidung');
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

        Schema::drop('hoadonnhap');
    }
}
