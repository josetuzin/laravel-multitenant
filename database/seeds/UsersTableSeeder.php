<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name'      => 'José',
            'email'     => 'jose@jose.com',
            'password'  => bcrypt('jose00'),
        ]);
    }
}
