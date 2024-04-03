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
            'password'  => Hash::make('superAdminPassword1'),
        ]);
        $superAdmin->assignrole('Super Admin');

        $over1 = User::create([
            'name'      => 'Daniel Leyshon',
            'email'     => 'dan@accessplatforms.co.uk',
            'password'  => Hash::make('Password1'),
        ]);
        $over1->assignrole('Overlord');

        $over1 = User::create([
            'name'      => 'Hannah Treggales',
            'email'     => 'hannah@accessplatforms.co.uk',
            'password'  => Hash::make('Password1'),
        ]);
        $over1->assignrole('Overlord');

        $under1 = User::create([
            'name'      => 'Chris Rowell',
            'email'     => 'chris.rowell@accessplatforms.co.uk',
            'password'  => Hash::make('Password1'),
        ]);
        $under1->assignrole('Underling');

        $under2 = User::create([
            'name'      => 'Oli',
            'email'     => 'oli@accessplatforms.co.uk',
            'password'  => Hash::make('Password1'),
        ]);
        $under2->assignrole('Underling');

        $under3 = User::create([
            'name'      => 'Danny Bond',
            'email'     => 'danny@accessplatforms.co.uk',
            'password'  => Hash::make('Password1'),
        ]);
        $under3->assignrole('Underling');

        $under4 = User::create([
            'name'      => 'Chris Banks',
            'email'     => 'chris@accessplatforms.co.uk',
            'password'  => Hash::make('Password1'),
        ]);
        $under4->assignrole('Underling');

    }
}
