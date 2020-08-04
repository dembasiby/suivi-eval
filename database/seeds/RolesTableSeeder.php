<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],

            [
                'id'    => 2,
                'title' => 'Coordonnateur',
            ],

            [
                'id'    => 3,
                'title' => 'Point focal',
            ],

            [
                'id'    => 4,
                'title' => 'Fournisseur',
            ],

            [
                'id'    => 5,
                'title' => 'Utilisateur',
            ],
        ];

        Role::insert($roles);
    }
}
