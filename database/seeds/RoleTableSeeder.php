<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);
        $suspend = Role::create(['name' => 'Suspend']);
    }
}
