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
        $admin = Role::create(['name' => 'Admin']);
        $customer = Role::create(['name' => 'Customer Manager']);

        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',

            'create-customer',
            'edit-customer',
            'delete-customer',

            'create-machine',
            'edit-machine',
            'delete-machine',

            'create-job',
            'edit-job',
            'delete-job',

            'create-jobstatus',
            'edit-jobstatus',
            'delete-jobstatus',

            'create-jobtype',
            'edit-jobtype',
            'delete-jobtype',
        ]);

        $customer->givePermissionTo([
            'create-customer',
            'edit-customer',
            'delete-customer',
        ]);
    }
}
