<?php

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            "name"       => "Kuş Sesleri",
            "image_path" => "kus.png"
        ]);

        Categories::create([
            "name"       => "Piyano Sesleri",
            "image_path" => "piyano.png"
        ]);

        Categories::create([
            "name"       => "Doğa Sesleri",
            "image_path" => "doga.png"
        ]);
    }
}
