<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Movie
{
    public $name;
    public $category;
    public $image;

    public function __construct($n, $c, $i)
    {
        $this->name = $n;
        $this->category = $c;
        $this->image = $i;
    }
}

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /* Define some movies */
        $movies = array();
        array_push($movies, new Movie('El señor de los anillos', 1, 'esdla.jpg'));
        array_push($movies, new Movie('Ironman', 2, 'im.jpg'));
        array_push($movies, new Movie('Passengers', 3, 'p.jpg'));
        array_push($movies, new Movie('V de Vendetta', 2, 'vdv.jpg'));

        $_n = rand(0, 3);
        return [
            'name' => $movies[$_n]->name,
            'description' => $this->faker->text(200),
            'category' => $movies[$_n]->category,
            'stock' => rand(1, 50),
            'price' => rand(1, 20),
            'rating' => rand(1, 5),
            'rating' => rand(1, 5),
            'image' => $movies[$_n]->image,
            //'image' => $this->faker->imageUrl($width = 400, $height = 400),
        ];
    }
}
