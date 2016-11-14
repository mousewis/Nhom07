
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantriTable extends Migration
{
    /**
     * Run the migrations.
     * @table quantri
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantri', function (Blueprint $table) {
            /** @var TYPE_NAME $table */
            $table->string('qt_maso',64);
            $table->string('qt_email', 64);
            $table->string('qt_matkhau', 256);
            # Indexes
            $table->unique('qt_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('quantri');
    }
}
