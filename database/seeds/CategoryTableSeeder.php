<?php

use Illuminate\Database\Seeder;
use App\Models\Quiz\Category\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::rebuild(true);
    }
}
