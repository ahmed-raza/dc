<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        ['name'=>'Mobile Phones', 'slug'=>'mobile_phones'],
        ['name'=>'Laptops', 'slug'=>'laptops'],
        ['name'=>'Other Electronics', 'slug'=>'other_electronics'],
        ['name'=>'Toys', 'slug'=>'toys'],
        ['name'=>'Home Applainces', 'slug'=>'home_applainces']
      ];
      foreach ($categories as $category) {
        Category::create($category);
      }
    }
}
