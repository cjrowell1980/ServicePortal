<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobType::create([ // 1
            'order'     => 10,
            'name'      => 'Breakdown',
        ]);
        JobType::create([ // 2
            'order'     => 20,
            'name'      => 'Service / LOLER',
        ]);
        JobType::create([ // 2
            'order'     => 20,
            'name'      => 'Defects & Repairs',
        ]);
        JobType::create([ // 3
            'order'     => 40,
            'name'      => 'Warranty',
        ]);
    }
}
