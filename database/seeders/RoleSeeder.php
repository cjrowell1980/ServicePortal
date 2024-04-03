<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $manager = Role::create(['name' => 'Overlord']);
        $manager->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',

            'create-customer',
            'edit-customer',

            'create-machine',
            'edit-machine',

            'create-job',
            'edit-job',

            'create-jobstatus',
            'edit-jobstatus',

            'create-jobtype',
            'edit-jobtype',

            'create-engineer',
            'edit-engineer',

            'create-visit',
            'edit-visit',

            'create-visitstatus',
            'edit-visitstatus',
        ]);
        $under = Role::create(['name' => 'Underling']);
        $under->givePermissionTo([
            'create-customer',
            'edit-customer',

            'create-machine',
            'edit-machine',

            'create-job',
            'edit-job',

            'create-jobstatus',
            'edit-jobstatus',

            'create-jobtype',
            'edit-jobtype',

            'create-engineer',
            'edit-engineer',

            'create-visit',
            'edit-visit',

            'create-visitstatus',
            'edit-visitstatus',
        ]);
    }
}
