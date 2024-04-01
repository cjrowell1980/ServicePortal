<?php

namespace Database\Seeders;

use App\Models\Engineers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EngineerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Engineers::create([
            'short'     => 'ChrisR',
            'long'      => 'Chris Rowell',
            'email'     => 'chris.rowell@accessplatforms.co.uk',
            'number'    => '01480 891 251',
        ]);
        Engineers::create([
            'short'     => 'Danny',
            'long'      => 'Danny Bond',
            'email'     => 'danny@accessplatforms.co.uk',
            'number'    => '01480 891 251',
        ]);
        Engineers::create([
            'short'     => 'Warren',
            'long'      => 'Warren Hunt',
            'email'     => 'warren@accessplatforms.co.uk',
            'number'    => '01480 891 251',
        ]);
        Engineers::create([
            'short'     => 'ChrisB',
            'long'      => 'Chris bright',
            'email'     => 'chris.bright@accessplatforms.co.uk',
            'number'    => '01480 891 251',
        ]);
        Engineers::create([
            'short'     => 'Ben',
            'long'      => 'Ben Wild',
            'email'     => 'ben@accessplatforms.co.uk',
            'number'    => '01480 891 251',
        ]);
        Engineers::create([
            'short'     => 'ChrisB',
            'long'      => 'Chris banks',
            'email'     => 'chris@accessplatforms.co.uk',
            'number'    => '01480 891 251',
        ]);
    }
}
