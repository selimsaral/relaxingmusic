<?php

use App\Models\Songs;
use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Songs::create([
            "name"            => "Song 1",
            "song_path"       => "song1.mp4",
            "song_image_path" => "song1.png",
            "category_id"     => 1,
        ]);

        Songs::create([
            "name"            => "Song 2",
            "song_path"       => "song2.mp4",
            "song_image_path" => "song2.png",
            "category_id"     => 1,
        ]);

        Songs::create([
            "name"            => "Song 3",
            "song_path"       => "song3.mp4",
            "song_image_path" => "song3.png",
            "category_id"     => 2,
        ]);

        Songs::create([
            "name"            => "Song 4",
            "song_path"       => "song4.mp4",
            "song_image_path" => "song4.png",
            "category_id"     => 3,
        ]);

        Songs::create([
            "name"            => "Song 5",
            "song_path"       => "song5.mp4",
            "song_image_path" => "song5.png",
            "category_id"     => 3,
        ]);

        Songs::create([
            "name"            => "Song 6",
            "song_path"       => "song6.mp4",
            "song_image_path" => "song6.png",
            "category_id"     => 2,
        ]);
    }
}
