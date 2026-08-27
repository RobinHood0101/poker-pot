<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'name' => config('pokerpot.admin_user'),
            'email' => config('pokerpot.admin_email'),
            'password' => bcrypt(config('pokerpot.admin_password')),
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $admin->assignRole($adminRole);
    }
}
