<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            OrganisationTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            EffetIntermediaireTableSeeder::class,
            EffetImmediatTableSeeder::class,
            ExtrantTableSeeder::class,
            IndicateurTableSeeder::class,
        ]);
    }
}
