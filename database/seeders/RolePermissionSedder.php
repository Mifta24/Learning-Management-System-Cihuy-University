<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions (didefinisikan terlebih dahulu)
        $permissions = [
            'manage users',
            'manage roles',
            'manage permissions',
            'manage settings',
            'view results',
            'create exam',
            'edit exam',
            'delete exam',
            'view exam results',
            'create questions',
            'edit questions',
            'delete questions',
            'view participants',
            'assign exam',
            'take exam',
            'view own results',
            'view exam schedule',
            'generate reports',
        ];

        // Buat permissions di database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Roles (didefinisikan setelah permissions)
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);
        $operator = Role::create(['name' => 'operator']);

        // Assign all permissions to admin
        $admin->givePermissionTo(Permission::all());

        // Assign specific permissions to teacher
        $teacher->givePermissionTo([
            'create exam',
            'edit exam',
            'delete exam',
            'view exam results',
            'create questions',
            'edit questions',
            'delete questions',
            'view participants',
            'assign exam',
        ]);

        // Assign specific permissions to student
        $student->givePermissionTo([
            'take exam',
            'view own results',
            'view exam schedule',
        ]);

        // Assign specific permissions to operator
        $operator->givePermissionTo([
            'manage users',
            'view exam schedule',
            'generate reports',
        ]);
    }
}
