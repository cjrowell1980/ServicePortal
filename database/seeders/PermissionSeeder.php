<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =  [
            'create-role',
            'edit-role',
            'delete-role',

            'create-user',
            'edit-user',
            'delete-user',

            'create-customer',
            'edit-customer',
            'delete-customer',

            'edit-setting',

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

            'create-engineer',
            'edit-engineer',
            'delete-engineer',

            'create-visit',
            'edit-visit',
            'delete-visit',

            'create-visitstatus',
            'edit-visitstatus',
            'delete-visitstatus',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
