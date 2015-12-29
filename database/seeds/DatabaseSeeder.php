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

        //\CodeProject\Entities\Client::truncate();
        //\CodeProject\Entities\Project::truncate();
        //\CodeProject\Entities\ProjectNote::truncate();
        //\CodeProject\Entities\User::truncate();

        factory(\CodeProject\Entities\User::class, 10)->create();
        $this->call(ClientTableSeeder::class);
        $this->call(ProjectTableSeed::class);
        $this->call(ProjectNoteTableSeeder::class);



        Model::reguard();
    }
}
