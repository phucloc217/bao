<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('baiviet', function (Blueprint $table) {
            $table->foreign(['tacgia'], 'baiviet_ibfk_1')->references(['id'])->on('tacgia')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['danhmuc'], 'baiviet_ibfk_2')->references(['id'])->on('danhmuc')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baiviet', function (Blueprint $table) {
            $table->dropForeign('baiviet_ibfk_1');
            $table->dropForeign('baiviet_ibfk_2');
        });
    }
};
