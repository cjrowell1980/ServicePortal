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
            'name'      => 'author_name',
            'display'   => 'Authors Name',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => 'C.Rowell',
        ]);
        Settings::create([
            'group'     => 'general',
            'name'      => 'author_email',
            'display'   => 'Authors eMail',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => 'admin@amonkeysuncle.co.uk',
        ]);
        Settings::create([
            'group'     => 'general',
            'name'      => 'version',
            'display'   => 'Version',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => '1.0.0',
        ]);
    }
}
