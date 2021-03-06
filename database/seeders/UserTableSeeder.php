<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Suporte',
            'email' => 'suporte@theplace.com.br',
            'email_verified_at' => now(),
            'password' => bcrypt('pl4c32k@16'),
            'remember_token' => Str::random(10),
        ]);
    }
}
