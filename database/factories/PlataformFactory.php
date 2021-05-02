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
            'name' => $this->faker->randomElement(['ps4', 'switch', 'stadia', 'xbox one', 'ps5', 'xbox series x', 'pc', '3ds', 'ds', 'psp', 'ps vita', 'ps3', 'ps2', 'xbox 360', 'GBA', 'dreamcast', 'N64', 'game boy', 'game boy color'])
        ];
    }
}
