<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class CreateAdminUserRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =
            [
                'view dashboard',
                'manage roles',
                'manage users',
                'delete users',
                'chef functions',
                'view articles',
                'create articles',
                'edit articles',
                'delete articles',
                'view orders',
                'create orders',
                'edit orders',
                'delete orders',
                'complete orders',
            ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo('manage roles');
        $admin->givePermissionTo('manage users');
        $admin->givePermissionTo('view dashboard');
        $admin->givePermissionTo('delete users');
        $admin->givePermissionTo('chef functions');
        $admin->givePermissionTo('view articles');
        $admin->givePermissionTo('create articles');
        $admin->givePermissionTo('edit articles');
        $admin->givePermissionTo('delete articles');
        $admin->givePermissionTo('view orders');
        $admin->givePermissionTo('create orders');
        $admin->givePermissionTo('edit orders');
        $admin->givePermissionTo('delete orders');
        $admin->givePermissionTo('complete orders');

        $chef = Role::firstOrCreate(['name' => 'chef', 'guard_name' => 'web']);
        $chef->givePermissionTo('view articles');
        $chef->givePermissionTo('create articles');
        $chef->givePermissionTo('edit articles');
        $chef->givePermissionTo('delete articles');
        $chef->givePermissionTo('view orders');
        $chef->givePermissionTo('create orders');
        $chef->givePermissionTo('edit orders');
        $chef->givePermissionTo('delete orders');
        $chef->givePermissionTo('complete orders');
    }

}
