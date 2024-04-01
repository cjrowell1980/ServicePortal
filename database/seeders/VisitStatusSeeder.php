<?php

namespace Database\Seeders;

use App\Models\VisitStatus;
use Illuminate\Database\Seeder;

class VisitStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisitStatus::create([ // 1
            'order'     => 10,
            'name'      => 'Parts On order',
            'colour'    => 'info',
        ]);
        VisitStatus::create([ // 2
            'order'     => 20,
            'name'      => 'Pending Schedule',
            'colour'    => 'info',
        ]);
        VisitStatus::create([ // 3
            'order'     => 30,
            'name'      => 'Scheduled',
            'colour'    => 'warning',
        ]);
        VisitStatus::create([ // 4
            'order'     => 40,
            'name'      => 'Repaired, Paperwork',
            'colour'    => 'warning',
        ]);
        VisitStatus::create([ // 5
            'order'     => 50,
            'name'      => 'Complete',
            'colour'    => 'success',
        ]);
    }
}
