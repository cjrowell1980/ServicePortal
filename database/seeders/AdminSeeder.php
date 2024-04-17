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
            'password'  => Hash::make(env('SUPER_ADMIN_PASSWORD')),
        ]);
        $superAdmin->assignrole('Super Admin');

    }
}
