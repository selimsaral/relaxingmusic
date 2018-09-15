<?php

use App\Models\Favorites;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favorites::create([
            'song_id' => 1,
            'user_id' => 1,
        ]);

        Favorites::create([
            'song_id' => 1,
            'user_id' => 2,
        ]);

        Favorites::create([
            'song_id' => 2,
            'user_id' => 3,
        ]);

        Favorites::create([
            'song_id' => 3,
            'user_id' => 1,
        ]);

        Favorites::create([
            'song_id' => 3,
            'user_id' => 3,
        ]);
    }
}
