<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(25),
            'description' => $this->faker->text(150),
            'img' => 'img/imagen-' . $this->faker->randomNumber(1),
            'pegi' => $this->faker->randomElement(['3','7','12','16','18']),
            'price' => $this->faker->randomFloat(2,1,200),
            'state' => $this->faker->randomElement(['mal', 'regular', 'bien', 'como nuevo']),
            'published_at' => $this->faker->dateTime(),
            'plataforms' => $this->faker->randomElement(['ps4', 'ps5', 'xboxOne', 'xboxX', 'NS', 'Stadia'])
        ];
    }
}

