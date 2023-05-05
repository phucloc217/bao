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
        Schema::create('baiviet', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('tieude');
            $table->text('tomtat')->nullable();
            $table->text('noidung');
            $table->string('slug')->nullable();
            $table->string('anh')->default('default.jpg');
            $table->boolean('trangthai')->default(false);
            $table->integer('danhmuc')->nullable()->index('danhmuc');
            $table->integer('tacgia')->nullable()->index('tacgia');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baiviet');
    }
};
