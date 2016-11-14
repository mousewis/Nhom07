
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     * @table nguoidung
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->string('nd_maso',64);
            $table->string('nd_email', 64);
            $table->string('nd_matkhau', 256);
            $table->string('nd_hoten', 256);
            $table->string('nd_sdt', 256);
            $table->string('nd_dchi', 256);
            $table->integer('nd_loai');
            $table->integer('nd_taikhoan');
            $table->integer('nd_tinhtrang');
            $table->integer('nd_danhgia');
            $table->string('nd_kichhoat',256);
            # Indexes
            $table->unique('nd_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {

        Schema::drop('nguoidung');
    }
}
