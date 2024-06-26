<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // General Settings
        Settings::create([
            'group'     => 'general',
            'name'      => 'version',
            'display'   => 'Version',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => '1.0.0',
        ]);
        Settings::create([
            'group'     => 'general',
            'name'      => 'site_title',
            'display'   => 'Site Title',
            'type'      => 'string',
            'locked'    => false,
            'payload'   => 'servicePortal',
        ]);
        Settings::create([
            'group'     => 'general',
            'name'      => 'site_name',
            'display'   => 'Site Name',
            'type'      => 'string',
            'locked'    => false,
            'payload'   => 'Service Portal',
        ]);
        Settings::create([
            'group'     => 'general',
            'name'      => 'debug_warning',
            'display'   => 'Enable Warning Message',
            'type'      => 'boolean',
            'locked'    => false,
            'payload'   => '1',
        ]);
        Settings::create([
            'group'     => 'general',
            'name'      => 'debug_error',
            'display'   => 'Enable Error Message',
            'type'      => 'boolean',
            'locked'    => false,
            'payload'   => '1',
        ]);

        // Defaults
        Settings::create([
            'group'     => 'defaults',
            'name'      => 'default_job_open',
            'display'   => 'Default New Job Status',
            'type'      => 'modelinteger',
            'locked'    => false,
            'payload'   => '1', // New Job
            'model'     => 'JobStatus',
        ]);
        Settings::create([
            'group'     => 'defaults',
            'name'      => 'default_job_close',
            'display'   => 'Job Closed Status',
            'type'      => 'modelinteger',
            'locked'    => false,
            'payload'   => '5', // Closed
            'model'     => 'JobStatus',
        ]);
        Settings::create([
            'group'     => 'defaults',
            'name'      => 'default_job_overdue',
            'display'   => 'Staus for overdue Jobs',
            'type'      => 'modelinteger',
            'locked'    => false,
            'payload'   => '6', // Overdue
            'model'     => 'JobStatus',
        ]);
        Settings::create([
            'group'     => 'defaults',
            'name'      => 'default_overdue_duration',
            'display'   => 'Days before overdue',
            'type'      => 'integer',
            'locked'    => false,
            'payload'   => '7', // days
            'model'     => '',
        ]);
        Settings::create([
            'group'     => 'defaults',
            'name'      => 'default_visit_open_status',
            'display'   => 'Default New Visit Status',
            'type'      => 'modelinteger',
            'locked'    => false,
            'payload'   => '2',
            'model'     => 'VisitStatus',
        ]);
        Settings::create([
            'group'     => 'defaults',
            'name'      => 'visit_closed_status',
            'display'   => 'Complete Visit Status',
            'type'      => 'modelinteger',
            'locked'    => false,
            'payload'   => '5',
            'model'     => 'VisitStatus',
        ]);

        // Author Details
        Settings::create([
            'group'     => 'author',
            'name'      => 'author_name',
            'display'   => 'Authors Name',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => 'C.Rowell',
        ]);
        Settings::create([
            'group'     => 'author',
            'name'      => 'author_email',
            'display'   => 'Authors eMail',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => 'admin@amonkeysuncle.co.uk',
        ]);
    }
}
