<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =  [
            [
                'name' => 'super Admin',
            ],
            [
              'name' => 'Admin',
            ],
            [
              'name' => 'user',
            ]
          ];

          Role::insert($role);
    }
}
