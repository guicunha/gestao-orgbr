<?php

/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 24/12/15
 * Time: 17:23
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\CodeProject\Entities\User::class)->create([
            'name' => 'Guilherme Cunha',
            'email' => 'cunha@guilherme.co',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
        factory(\CodeProject\Entities\User::class, 10)->create();

    }

}