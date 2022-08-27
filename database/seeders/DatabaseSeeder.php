<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'read roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'read permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        $role1 = Role::create(['name' => 'super-user']);
        $role1->givePermissionTo('create users');
        $role1->givePermissionTo('read users');
        $role1->givePermissionTo('update users');
        $role1->givePermissionTo('delete users');
        $role1->givePermissionTo('create roles');
        $role1->givePermissionTo('read roles');
        $role1->givePermissionTo('update roles');
        $role1->givePermissionTo('delete roles');
        $role1->givePermissionTo('create permissions');
        $role1->givePermissionTo('read roles');
        $role1->givePermissionTo('update permissions');
        $role1->givePermissionTo('delete permissions');

        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo('create users');
        $role2->givePermissionTo('read users');
        $role2->givePermissionTo('update users');
        $role2->givePermissionTo('create roles');
        $role2->givePermissionTo('read roles');
        $role2->givePermissionTo('update roles');
        $role2->givePermissionTo('create permissions');
        $role2->givePermissionTo('read roles');
        $role2->givePermissionTo('update permissions');

        \App\Models\User::factory(10)->create();

        $userList = User::get();

        foreach ($userList as $u)
        {
            $u->assignRole($role2);
        }

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@themesbrand.com',
            'password' => Hash::make('123456'),
            'email_verified_at'=>'2022-01-02 17:04:58',
            'created_at' => now(),
        ]);

        $user->assignRole($role1);
    }
}
