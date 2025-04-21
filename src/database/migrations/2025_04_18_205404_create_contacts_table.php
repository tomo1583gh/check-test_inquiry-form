<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); //id(主キー)

            $table->unsignedBigInteger('category_id'); // 外部キー（categoriesテーブル）
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->tinyInteger('gender'); // 1:男性, 2:女性, 3:その他
            $table->string('email', 255);
            $table->string('tel', 255);
            $table->string('address', 255);
            $table->string('building', 255)->nullable();
            $table->text('detail'); // お問い合わせ内容

            $table->timestamps();

            // 外部キー制約
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
