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

        // Package Details
        Settings::create([
            'group'     => 'package',
            'name'      => 'author_name',
            'display'   => 'Developer Name',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => 'C.Rowell',
        ]);
        Settings::create([
            'group'     => 'package',
            'name'      => 'author_email',
            'display'   => 'Developer eMail',
            'type'      => 'email',
            'locked'    => true,
            'payload'   => 'admin@amonkeysuncle.co.uk',
        ]);
        Settings::create([
            'group'     => 'package',
            'name'      => 'version',
            'display'   => 'Version',
            'type'      => 'string',
            'locked'    => true,
            'payload'   => '1.0.0',
        ]);

        // User Account Settings
        Settings::create([
            'group'     => 'account',
            'name'      => 'account_registration',
            'display'   => 'Enable account registration',
            'type'      => 'boolean',
            'locked'    => false,
            'payload'   => '0',
        ]);
        Settings::create([
            'group'     => 'account',
            'name'      => 'account_password_reset',
            'display'   => 'Enable forgot password',
            'type'      => 'boolean',
            'locked'    => false,
            'payload'   => '1',
        ]);
        Settings::create([
            'group'     => 'account',
            'name'      => 'account_verify',
            'display'   => 'Enable email verification',
            'type'      => 'boolean',
            'locked'    => false,
            'payload'   => '0',
        ]);
    }
}
