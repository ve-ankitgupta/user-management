<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'test@email.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => true
        ]);
    }
}
