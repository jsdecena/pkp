<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        App\Models\User::create(['name' => 'John Doe', 'email' => 'foo@bar.com', 'password' => Hash::make('Testing123')]);

        $this->command->info('User table seeded!');
    }
}
