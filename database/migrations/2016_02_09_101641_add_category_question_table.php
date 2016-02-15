<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_question', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->index();
            $table->integer('question_id')->unsigned()->index();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
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
        Schema::table('category_question', function (Blueprint $table) {
            $table->dropForeign('category_question' . '_category_id_foreign');
            $table->dropForeign('category_question' . '_question_id_foreign');
        });

        Schema::drop('category_question');
    }
}
