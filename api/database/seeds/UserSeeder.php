<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'first_name' => 'Pedro',
            'last_name' => 'Piedade',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('Password1')
        ]);

        factory(User::class, 5)->create();
    }
}
