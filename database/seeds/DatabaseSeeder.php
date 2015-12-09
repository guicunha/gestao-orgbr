<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->call(ClientTableSeeder::class);
        $this->call(ProjectTableSeed::class);

        \CodeProject\Entities\User::truncate();
        factory(\CodeProject\Entities\User::class, 5)->create();

        Model::reguard();
    }
}
