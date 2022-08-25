<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = ['nessuna', 'cucina', 'news', 'sport', 'animali', 'vacanze', 'informatica'];

        foreach ($categories as $category) {
            Category::create([
                'slug'=> Category::getSlug($category),
                'name'=> $category,
                'description'=> $faker->paragraph(rand(2,6), true)
            ]);
        }
    }
}
