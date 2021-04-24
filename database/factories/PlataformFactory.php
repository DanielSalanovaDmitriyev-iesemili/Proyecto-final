<?php

namespace Database\Factories;

use App\Models\Plataform;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlataformFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plataform::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(25)
        ];
    }
}
