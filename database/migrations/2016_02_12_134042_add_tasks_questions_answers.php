<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTasksQuestionsAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('quiz.tasks_questions_answers_table'), function (Blueprint $table) {
            $table->integer('task_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('answer_id')->unsigned();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('task_id')
                ->references('id')
                ->on(config('quiz.tasks_table'))
                ->onDelete('cascade');

            $table->foreign('question_id')
                ->references('id')
                ->on(config('quiz.questions_table'))
                ->onDelete('cascade');

            $table->foreign('answer_id')
                ->references('id')
                ->on(config('quiz.answers_table'))
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
        Schema::table(config('quiz.tasks_questions_answers_table'), function (Blueprint $table) {
            $table->dropForeign(config('quiz.tasks_questions_answers_table') . '_task_id_foreign');
            $table->dropForeign(config('quiz.tasks_questions_answers_table') . '_question_id_foreign');
            $table->dropForeign(config('quiz.tasks_questions_answers_table') . '_answer_id_foreign');
        });

        Schema::drop(config('quiz.tasks_questions_answers_table'));
    }
}
