<?php

use Illuminate\Database\Seeder;

class ProjectTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \CodeProject\Entities\Project::truncate();
        factory(\CodeProject\Entities\Project::class, 10)->create();

    }
}
