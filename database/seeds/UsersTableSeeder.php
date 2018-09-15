<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "appuid"      => str_random(32),
            "token"       => str_random(32),
            "app_version" => "1.0",
            "app_lang"    => "TR",
        ]);

        User::create([
            "appuid"      => str_random(32),
            "token"       => str_random(32),
            "app_version" => "1.2",
            "app_lang"    => "EN",
        ]);

        User::create([
            "appuid"      => str_random(32),
            "token"       => str_random(32),
            "app_version" => "1.5",
            "app_lang"    => "TR",
        ]);

        User::create([
            "appuid"      => str_random(32),
            "token"       => str_random(32),
            "app_version" => "1.5",
            "app_lang"    => "EN",
        ]);

    }
}
