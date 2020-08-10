<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'team_create',
            ],
            [
                'id'    => 18,
                'title' => 'team_edit',
            ],
            [
                'id'    => 19,
                'title' => 'team_show',
            ],
            [
                'id'    => 20,
                'title' => 'team_delete',
            ],
            [
                'id'    => 21,
                'title' => 'team_access',
            ],
            [
                'id'    => 22,
                'title' => 'organisation_create',
            ],
            [
                'id'    => 23,
                'title' => 'organisation_edit',
            ],
            [
                'id'    => 24,
                'title' => 'organisation_show',
            ],
            [
                'id'    => 25,
                'title' => 'organisation_delete',
            ],
            [
                'id'    => 26,
                'title' => 'organisation_access',
            ],
            [
                'id'    => 27,
                'title' => 'strategie_access',
            ],
            [
                'id'    => 28,
                'title' => 'effet_intermediaire_create',
            ],
            [
                'id'    => 29,
                'title' => 'effet_intermediaire_edit',
            ],
            [
                'id'    => 30,
                'title' => 'effet_intermediaire_show',
            ],
            [
                'id'    => 31,
                'title' => 'effet_intermediaire_delete',
            ],
            [
                'id'    => 32,
                'title' => 'effet_intermediaire_access',
            ],
            [
                'id'    => 33,
                'title' => 'effet_immediat_create',
            ],
            [
                'id'    => 34,
                'title' => 'effet_immediat_edit',
            ],
            [
                'id'    => 35,
                'title' => 'effet_immediat_show',
            ],
            [
                'id'    => 36,
                'title' => 'effet_immediat_delete',
            ],
            [
                'id'    => 37,
                'title' => 'effet_immediat_access',
            ],
            [
                'id'    => 38,
                'title' => 'extrant_create',
            ],
            [
                'id'    => 39,
                'title' => 'extrant_edit',
            ],
            [
                'id'    => 40,
                'title' => 'extrant_show',
            ],
            [
                'id'    => 41,
                'title' => 'extrant_delete',
            ],
            [
                'id'    => 42,
                'title' => 'extrant_access',
            ],
            [
                'id'    => 43,
                'title' => 'gaf_i_access',
            ],
            [
                'id'    => 44,
                'title' => 'resultat_intermediaire_create',
            ],
            [
                'id'    => 45,
                'title' => 'resultat_intermediaire_edit',
            ],
            [
                'id'    => 46,
                'title' => 'resultat_intermediaire_show',
            ],
            [
                'id'    => 47,
                'title' => 'resultat_intermediaire_delete',
            ],
            [
                'id'    => 48,
                'title' => 'resultat_intermediaire_access',
            ],
            [
                'id'    => 49,
                'title' => 'probleme_central_create',
            ],
            [
                'id'    => 50,
                'title' => 'probleme_central_edit',
            ],
            [
                'id'    => 51,
                'title' => 'probleme_central_show',
            ],
            [
                'id'    => 52,
                'title' => 'probleme_central_delete',
            ],
            [
                'id'    => 53,
                'title' => 'probleme_central_access',
            ],
            [
                'id'    => 54,
                'title' => 'recueil_de_donnee_access',
            ],
            [
                'id'    => 55,
                'title' => 'indicateur_create',
            ],
            [
                'id'    => 56,
                'title' => 'indicateur_edit',
            ],
            [
                'id'    => 57,
                'title' => 'indicateur_show',
            ],
            [
                'id'    => 58,
                'title' => 'indicateur_delete',
            ],
            [
                'id'    => 59,
                'title' => 'indicateur_access',
            ],
            [
                'id'    => 60,
                'title' => 'type_question_create',
            ],
            [
                'id'    => 61,
                'title' => 'type_question_edit',
            ],
            [
                'id'    => 62,
                'title' => 'type_question_show',
            ],
            [
                'id'    => 63,
                'title' => 'type_question_delete',
            ],
            [
                'id'    => 64,
                'title' => 'type_question_access',
            ],
            [
                'id'    => 65,
                'title' => 'question_create',
            ],
            [
                'id'    => 66,
                'title' => 'question_edit',
            ],
            [
                'id'    => 67,
                'title' => 'question_show',
            ],
            [
                'id'    => 68,
                'title' => 'question_delete',
            ],
            [
                'id'    => 69,
                'title' => 'question_access',
            ],
            [
                'id'    => 70,
                'title' => 'questionnaire_create',
            ],
            [
                'id'    => 71,
                'title' => 'questionnaire_edit',
            ],
            [
                'id'    => 72,
                'title' => 'questionnaire_show',
            ],
            [
                'id'    => 73,
                'title' => 'questionnaire_delete',
            ],
            [
                'id'    => 74,
                'title' => 'questionnaire_access',
            ],
            [
                'id'    => 75,
                'title' => 'reponse_create',
            ],
            [
                'id'    => 76,
                'title' => 'reponse_edit',
            ],
            [
                'id'    => 77,
                'title' => 'reponse_show',
            ],
            [
                'id'    => 78,
                'title' => 'reponse_delete',
            ],
            [
                'id'    => 79,
                'title' => 'reponse_access',
            ],
            [
                'id'    => 80,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 81,
                'title' => 'questionnaire_control',
            ],
            [
                'id'    => 82,
                'title' => 'questionnaire_validate',
            ],
        ];

        Permission::insert($permissions);
    }
}
