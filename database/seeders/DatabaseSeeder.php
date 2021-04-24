<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Game::factory(50)->create();
        \App\Models\Category::factory(20)->create();

        $faker = Factory::create();
        $categories = Category::all();
        $games = Game::all();



        Game::factory(10)->hasAttached(User::factory()->count(2),
        [
            'is_purchased' => $faker->randomElement([true, false]),
            'comment' => $faker->paragraph(3)
        ])->create();

        Game::all()->each(function ($game) use ($categories) {
            $game->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
