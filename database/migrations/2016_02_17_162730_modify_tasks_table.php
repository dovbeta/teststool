<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(config('quiz.tasks_table'), function (Blueprint $table) {
            $table->dropColumn('test_start');
            $table->dropColumn('spent_time');

            $table->dateTime('started_at');
            $table->dateTime('finished_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('quiz.tasks_table'), function (Blueprint $table) {
            $table->dropColumn('started_at');
            $table->dropColumn('finished_at');

            $table->dateTime('test_start');
            $table->integer('spent_time');
        });
    }
}
