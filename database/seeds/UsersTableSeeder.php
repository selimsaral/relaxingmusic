<?php

use App\User;
use Carbon\Carbon;
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
            "appuid"            => str_random(32),
            "token"             => str_random(32),
            "token_expiry_date" => Carbon::now()->addHour(24),
            "app_version"       => "1.0",
            "lang_version"      => "1.0",
            "app_lang"          => "TR",
        ]);

        User::create([
            "appuid"            => str_random(32),
            "token"             => str_random(32),
            "token_expiry_date" => Carbon::now()->subHour(24),
            "app_version"       => "1.2",
            "lang_version"      => "1.0",
            "app_lang"          => "EN",
        ]);

        User::create([
            "appuid"            => str_random(32),
            "token"             => str_random(32),
            "token_expiry_date" => Carbon::now()->addHour(24),
            "app_version"       => "1.5",
            "lang_version"      => "1.0",
            "app_lang"          => "TR",
        ]);

        User::create([
            "appuid"            => str_random(32),
            "token"             => str_random(32),
            "token_expiry_date" => Carbon::now()->subHour(24),
            "app_version"       => "1.5",
            "lang_version"      => "1.0",
            "app_lang"          => "EN",
        ]);

    }
}
