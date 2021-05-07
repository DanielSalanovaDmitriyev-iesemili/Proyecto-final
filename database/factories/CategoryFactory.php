<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$this->faker->randomElement(['accion', 'aventuras', 'mmo', 'rpg', 'rol', 'mesa', 'shooter']),
            'description:es' => $this->faker->text(),
            'description:en' => $this->faker->text(),
            'img' => 'img/category-' . $this->faker->randomNumber(1)
        ];
    }
}

// // $table->string('name', 25);
// $table->text('description', 100);
// $table->string('img', 35);
