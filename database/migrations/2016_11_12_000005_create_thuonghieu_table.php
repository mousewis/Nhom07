
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuonghieuTable extends Migration
{
    /**
     * Run the migrations.
     * @table thuonghieu
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuonghieu', function (Blueprint $table) {
            $table->increments('th_maso');
            $table->string('th_ten', 256);
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

        Schema::drop('thuonghieu');
    }
}
