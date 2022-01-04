<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(['id' => '1','name' => 'Fantasia']);
        Category::insert(['id' => '2','name' => 'Acción']);
        Category::insert(['id' => '3','name' => 'Romance']);
    }
}
