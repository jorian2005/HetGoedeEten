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
            ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo('manage roles');
        $admin->givePermissionTo('manage users');
        $admin->givePermissionTo('view dashboard');

        $user = User::orderBy('id', 'asc')->first();
        if ($user) {
            $user->assignRole($admin);
        }
    }

}
