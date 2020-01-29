<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrators',],
            ['id' => 2, 'title' => 'Users',],
            ['id' => 3, 'title' => 'Directors',],
            ['id' => 4, 'title' => 'Modarators',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
