<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\RolePermissionSedder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RolePermissionSedder::class);


        $user = User::create([
            'name' => 'Admin Cbt',
            'email' => 'admin@cbt.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('admin');
    }
}
