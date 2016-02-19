<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNestedSetColumnsToCategoriesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table(config('quiz.categories_table'), function(Blueprint $table) {
      // These columns are needed for Baum's Nested Set implementation to work.
      // Column names may be changed, but they *must* all exist and be modified
      // in the model.
      // Take a look at the model scaffold comments for details.
      // We add indexes on parent_id, lft, rgt columns by default.
      $table->integer('parent_id')->nullable()->index();
      $table->integer('lft')->nullable()->index();
      $table->integer('rgt')->nullable()->index();
      $table->integer('depth')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table(config('quiz.categories_table'), function (Blueprint $table) {

      $table->dropColumn('parent_id');
      $table->dropColumn('lft');
      $table->dropColumn('rgt');
      $table->dropColumn('depth');
    });
  }

}
