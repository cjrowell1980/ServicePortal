<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name'      => 'Super Admin',
            'email'     => 'super@super.super',
            'password'  => Hash::make('superAdminPassword'),
        ]);
        $superAdmin->assignrole('Super Admin');

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.admin',
            'password'  => Hash::make('adminPassword'),
        ]);
        $admin->assignrole('Admin');

        $customer = User::create([
            'name'      => 'Customer Manager',
            'email'     => 'cust@cust.cust',
            'password'  => Hash::make('CustomerManagerPassword'),
        ]);
        $customer->assignrole('Customer Manager');




    }
}
