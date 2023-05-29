<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' =>'Admin']);

        $usuario = Role::create(['name' =>'Usuario']);

        Permission::create(['name' => 'Ver menus'])->syncRoles([$usuario,$admin]);

        Permission::create(['name' => 'Ver panel'])->assignRole($admin);
    }
}
