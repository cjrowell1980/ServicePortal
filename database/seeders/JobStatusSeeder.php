<?php

namespace Database\Seeders;

use App\Models\JobStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobStatus::create([ // 1
            'order'     => 10,
            'name'      => 'New Job',
            'colour'    => 'warning',
        ]);
        JobStatus::create([ // 2
            'order'     => 20,
            'name'      => 'Scheduled',
            'colour'    => 'info',
        ]);
        JobStatus::create([ // 3
            'order'     => 30,
            'name'      => 'Repairs Complete',
            'colour'    => 'success',
        ]);
        JobStatus::create([ // 4
            'order'     => 40,
            'name'      => 'Waiting Paperwork',
            'colour'    => 'success',
        ]);
        JobStatus::create([ // 5
            'order'     => 50,
            'name'      => 'Closed',
            'colour'    => 'light',
        ]);
        JobStatus::create([ // 6
            'order'     => 100,
            'name'      => '!! Overdue !!',
            'colour'    => 'danger',
        ]);
    }
}
