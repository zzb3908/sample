<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
