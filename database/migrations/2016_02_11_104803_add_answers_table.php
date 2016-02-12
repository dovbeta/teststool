<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('quiz.answers_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('is_correct')->default(false);
            $table->integer('question_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('question_id')
                ->references('id')
                ->on(config('quiz.questions_table'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('quiz.answers_table'), function (Blueprint $table) {
            $table->dropForeign(config('quiz.answers_table') . '_question_id_foreign');
        });

        Schema::drop(config('quiz.answers_table'));
    }
}
