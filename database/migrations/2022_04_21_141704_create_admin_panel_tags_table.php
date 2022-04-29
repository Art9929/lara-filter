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
        Schema::create('admin_panel_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('post_id')->nullable();
            $table->unsignedTinyInteger('tag_id')->nullable();

            $table->index('post_id', 'post_tag_post_idx');
            $table->index('tag_id', 'post_tag_tag_idx');

            $table->foreign('post_id', 'post_tag_post_fk', )->references('id')->on('admin_panels');
            $table->foreign('tag_id', 'post_tag_tag_fk')->references('id')->on('tags');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_panel_tags');
    }
};
