<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\Plataform;
use App\Models\Rol;
use App\Models\Room;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $rol1 = new Rol();
        $rol1->name = "admin";
        $rol1->save();
        $rol2 = new Rol();
        $rol2->name = "client";
        $rol2->save();
        $rol3 = new Rol();
        $rol3->name = "chat";
        $rol3->save();


        $salaPrivada = new Room();
        $salaPrivada->name = "private";
        $salaPrivada->save();
        $salaPublica = new Room();
        $salaPublica->name = "public";
        $salaPublica->save();
        \App\Models\Category::factory(20)->create();
        \App\Models\Plataform::factory(6)->create();
        \App\Models\Game::factory(10)->create();
        \App\Models\User::factory(5)->create();

        $adminUser = new User();
        $adminUser->name = "Admin";
        $adminUser->rol_id = 1;
        $adminUser->email = "admin@gmail.com";
        $adminUser->password = Hash::make(12345678);
        $adminUser->save();

        $chatUser = new User();
        $chatUser->name = "Chat";
        $chatUser->rol_id = 3;
        $chatUser->email = "chat@gmail.com";
        $chatUser->password = Hash::make(12345678);
        $chatUser->save();

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
