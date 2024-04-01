<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JobStatusSeeder::class,
            JobTypeSeeder::class,
            VisitStatusSeeder::class,
            EngineerSeeder::class,
            SettingsSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
