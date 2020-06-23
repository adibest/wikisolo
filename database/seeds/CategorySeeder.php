<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::insert([
          [
            'name' => 'Berita'
          ],
          [
            'name' => 'Tutorial'
          ],
          [
            'name' => 'Opini'
          ]
        ]);
    }
}
