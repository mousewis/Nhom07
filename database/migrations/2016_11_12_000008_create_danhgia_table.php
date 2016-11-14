
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhgiaTable extends Migration
{
    /**
     * Run the migrations.
     * @table danhgia
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhgia', function (Blueprint $table) {
            $table->increments('dg_maso');
            $table->string('dg_nguoimua', 64);
            $table->string('dg_nguoiban', 64);
            $table->integer('dg_diem');
            $table->foreign('dg_nguoimua')->references('nd_maso')->on('nguoidung');
            $table->foreign('dg_nguoiban')->references('nd_maso')->on('nguoidung');
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

        Schema::drop('danhgia');
    }
}
