<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\Plataform;
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
        \App\Models\Plataform::factory(6)->create();
        \App\Models\Game::factory(10)->create();
        \App\Models\User::factory(5)->create();
        
        $faker = Factory::create();
        $categories = Category::all();
        $plataforms = Plataform::all();


        // Game::factory(10)->hasAttached(User::factory()->count(2),
        // [
        //     'is_purchased' => $faker->randomElement([true, false]),
        //     'comment' => $faker->paragraph(3)
        // ])->create();

        Game::all()->each(function ($game) use ($categories) {
            $game->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        Game::all()->each(function ($game) use ($plataforms) {
            $game->plataforms()->attach(
                $plataforms->random(rand(1, 6))->pluck('id')->toArray()
            );
        });

    }
}
