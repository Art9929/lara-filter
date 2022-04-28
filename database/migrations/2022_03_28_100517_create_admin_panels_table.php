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
        Schema::create('admin_panels', function (Blueprint $table) {
            $table->id();

                $table->string('name')->nullable();
                $table->string('price')->nullable();
                $table->string('weight')->nullable();
                $table->text('description')->nullable();
                $table->string('profile_image')->nullable();

            $table->timestamps();

            // "Мягкое удаление"
            $table->softDeletes();

            // Отношение "Один ко многим"
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            // index - для ускоренной сортировки, фильтрации по ключу
            $table->index('category_id', 'post_category_idx');
            $table->index('product_id', 'post_product_idx');

            // on - на какую таблицу ссылаться, references - на какую колонку
            $table->foreign('category_id', 'post_category_fk')->references('id')->on('categories');
            //  $table->foreignId('category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_panels');
    }
};
