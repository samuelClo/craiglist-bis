<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\City;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Image;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Bd',
            'slug' => Str::slug('Bd')
        ]);
        Category::create([
            'name' => 'Sports',
            'slug' => Str::slug('Sports')
        ]);
        Category::create([
            'name' => 'Alimentaire',
            'slug' => Str::slug('Alimentaire')
        ]);
        Category::create([
            'name' => 'Jeux',
            'slug' => Str::slug('Jeux')
        ]);
        Category::create([
            'name' => 'Voyages',
            'slug' => Str::slug('Voyages')
        ]);


        SubCategory::create([
            'name' => 'Aventure',
            'category_id' => 1,
            'slug' => Str::slug('Aventure')
        ]);
        SubCategory::create([
            'name' => 'Action',
            'category_id' => 1,
            'slug' => Str::slug('Action')
        ]);
        SubCategory::create([
            'name' => 'Romance',
            'category_id' => 1,
            'slug' => Str::slug('Romance')
        ]);

        SubCategory::create([
            'name' => 'Adulte',
            'category_id' => 1,
            'slug' => Str::slug('Adulte')
        ]);
        Article::create([
            'user_id' => 1,
            'city_id' => 1,
            'category_id' => 1,
            'sub_category_id' => 1,
            'title' => 'L\'aventure c\'est ma passion',
            'slug' => Str::slug('L\'aventure c\'est ma passion'),
            'description' => "Vend bd <L'aventure c'est ma passion> "
        ]);

        City::create([
            'name' => 'Paris',
            'slug' => Str::slug('Paris')
        ]);
        City::create([
            'name' => 'Marseille',
            'slug' => Str::slug('Marseille')
        ]);
        City::create([
            'name' => 'Nice',
            'slug' => Str::slug('Nice')
        ]);
        City::create([
            'name' => 'Dijon',
            'slug' => Str::slug('Dijon')
        ]);
        Image::create([
            'url_path' => 'https://picsum.photos/200/300',
            'article_id' => 1
        ]);
    }
}
