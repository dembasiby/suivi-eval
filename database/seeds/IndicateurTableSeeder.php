<?php

use App\Models\Question;
use App\Models\Indicateur;
use App\Models\TypeQuestion;
use Illuminate\Database\Seeder;

class IndicateurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $txt = TypeQuestion::create(['type' => 'text']); // <input type='text'> 1
        $nb = TypeQuestion::create(['type' => 'number']); // <input type='number'> 2
        $check = TypeQuestion::create(['type' => 'checkbox']); // <input type="checkbox"> 3
        $radio = TypeQuestion::create(['type' => 'radio']); // <input type="radio"> 4
        $date = TypeQuestion::create(['type' => 'date']); // <input type="date"> 5
        $textarea = TypeQuestion::create(['type' => 'textarea']); // <textarea></textarea> 6
        /* $obj = TypeQuestion::create(['type' => 'objet', 'champs' => [] ]) */


        $ind1 = Indicateur::create([
            'code_indicateur' => '1.1.1.1',
            'description' => 'Document signé par l\'autorité compétente ',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 1
        ]);

        $ind2 = Indicateur::create([
            'code_indicateur' => '1.1.1.2',
            'description' => 'La proportion d’acteurs pertinents ayant effectivement reçu le document',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 1
        ]);

        Question::create([
            'description' => 'A l’aide du tableau ci-aprés, veuillez indiquer le nombre d’acteurs, de parties prenantes et de partenaires ciblés par la communication du document de stratégie LBC/FT et ayant effectivement reçu le document au plus tard en 2020',
            'indicateur_id' => $ind2->id,
            'type_question_id' => 2
        ]);

        // Indicateur 3
        $ind3 = Indicateur::create([
            'code_indicateur' => '1.1.2.1',
            'description' => 'Un document de sensibilisation à l\'endroit des parties intéressées pertinentes disponible dans les trois (3) mois qui suivent l’adoption de la stratégie',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 2
        ]);

        Question::create([
            'description' => 'Un document de sensibilisation à l\'endroit des parties prenantes a-t-il été élaboré?',
            'indicateur_id' => $ind3->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => 'Si oui, veuillez indiquer la date d’adoption du document de sensibilisation à l’endroit des parties prenantes',
            'indicateur_id' => $ind3->id,
            'type_question_id' => 5
        ]);

        $ind4 = Indicateur::create([
            'code_indicateur' => '1.1.2.2',
            'description' => 'Taux de réalisation des sessions de sensibilisation programmées',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 2
        ]);


        Question::create([
            'description' => 'Des sessions de sensibilisation ont-elles été organisées?',
            'indicateur_id' => $ind4->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => 'Si- oui, veuillez préciser à l’aide du tableau, le nombre de sessions prévues et le nombre de sessions réalisées pour chaque année',
            'indicateur_id' => $ind4->id,
            'type_question_id' => 2
        ]);

        $ind5 = Indicateur::create([
            'code_indicateur' => '1.1.2.3',
            'description' => 'Le nombre de cibles sensibilisées',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 2
        ]);

        Question::create([
            'description' => 'Si- oui, veuillez préciser à l’aide du tableau, le nombre de cibles prévues et le nombre de cibles touchées pour chaque année',
            'indicateur_id' => $ind5->id,
            'type_question_id' => 2
        ]);


        Question::create([
            'description' => 'Veuillez préciser les catégories d’acteurs ayant été sensibilisées ?',
            'indicateur_id' => $ind5->id,
            'type_question_id' => 6
        ]);

        Question::create([
            'description' => 'Veuillez préciser les modalités et activités de sensibilisation effectivement mis en œuvre',
            'indicateur_id' => $ind5->id,
            'type_question_id' => 6
        ]);

        Question::create([
            'description' => 'Veuillez préciser de façon les effets de la sensibilisation observés sur les acteurs',
            'indicateur_id' => $ind5->id,
            'type_question_id' => 6
        ]);

        $ind6 = Indicateur::create([
            'code_indicateur' => '1.2.1.1',
            'description' => 'Effectivité des plaidoyers auprès des autorités supranationales',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 3
        ]);

        Question::create([
            'description' => 'Des actions de plaidoyer ont-elles été réalisées au niveau des autorités supranationales pour la prise de textes d’application de la loi 2018-03?',
            'indicateur_id' => $ind6->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => 'Si oui, veuillez citer à l’aide du tableau ci-après, le nombre total d’actions de plaidoyer menées sur la période, le nombre total d’autorités ciblées et d’autorités effectivement touchées par le plaidoyer?',
            'indicateur_id' => $ind6->id,
            'type_question_id' => 2
        ]);

        $ind7 = Indicateur::create([
            'code_indicateur' => '1.2.1.2',
            'description' => 'Nombre de textes pris',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 3
        ]);

        Question::create([
            'description' => 'Des textes d’application de la loi 2018-03 ont-ils été pris ?',
            'indicateur_id' => $ind7->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => 'Si oui, veuillez citer à l’aide du tableau ci-après, le nombre de textes d’application de la loi 2018-03 effectivement pris par période',
            'indicateur_id' => $ind7->id,
            'type_question_id' => 2
        ]);

        $ind8 = Indicateur::create([
            'code_indicateur' => '1.2.2.1',
            'description' => 'La fréquence de la revue de l’état des conventions internationales pertinentes',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 4
        ]);

        Question::create([
            'description' => 'Veuillez préciser à l’aide du tableau le nombre de revue de conventions internationales pertinentes à ratifier et à mettre en œuvre de manière complète en indiquant la période',
            'indicateur_id' => $ind8->id,
            'type_question_id' => 5
        ]);




        $ind9 = Indicateur::create([
            'code_indicateur' => '1.2.2.2',
            'description' => 'Taux de ratification des conventions internationales pertinentes',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 4
        ]);

        Question::create([
            'description' => 'Veuillez préciser à l’aide du tableau le nombre de conventions internationales pertinentes à ratifier et effectivement ratifiées en indiquant la période',
            'indicateur_id' => $ind9->id,
            'type_question_id' => 2
        ]);

        Question::create([
            'description' => 'Veuillez lister à l’aide du tableau ci-après les conventions effectivement ratifiées  et leur  implication sur le droit positif',
            'indicateur_id' => $ind9->id,
            'type_question_id' => 2
        ]);

        $ind10 = Indicateur::create([
            'code_indicateur' => '1.2.3.1',
            'description' => 'Nombre de textes pris pour encadrer les constructions juridiques',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        Question::create([
            'description' => 'Veuillez préciser la nature des textes pris pour encadrer les constructions juridiques',
            'indicateur_id' => $ind10->id,
            'type_question_id' => 1
        ]);

        $ind11 = Indicateur::create([
            'code_indicateur' => '1.2.3.2',
            'description' => 'Des mécanismes d’identification des bénéficiaires effectifs PM et CJ élaborés dans les délais',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        Question::create([
            'description' => 'Veuillez préciser le nombre de mécanismes d’identification des bénéficiaires effectifs des PM et CJ élaborés dans les délais',
            'indicateur_id' => $ind11->id,
            'type_question_id' => 2
        ]);


        $ind12 = Indicateur::create([
            'code_indicateur' => '1.2.3.3',
            'description' => 'Un registre des bénéficiaires effectifs accessible via une plateforme centrale nationale mis en place dans les délais',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        $ind13 = Indicateur::create([
            'code_indicateur' => '1.2.3.4',
            'description' => 'Un plaidoyer auprès de l’OHADA fait dans les délais',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        $ind14 = Indicateur::create([
            'code_indicateur' => '1.2.4.1',
            'description' => 'Le Code pénal est modifié dans les délais pour incriminer de manière complète le financement du terrorisme',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 6
        ]);

        $ind15 = Indicateur::create([
            'code_indicateur' => '1.2.5.1',
            'description' => 'Un Responsable de veille est désigné dans les délais et ses missions déclinées',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 7
        ]);

        $ind16 = Indicateur::create([
            'code_indicateur' => '1.2.5.2',
            'description' => 'Nombre de notes d’alerte périodiques produites',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 7
        ]);

        $ind17 = Indicateur::create([
            'code_indicateur' => '1.2.5.3',
            'description' => 'Nombre de rapports périodiques d’alerte produits',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 7
        ]);

        $ind18 = Indicateur::create([
            'code_indicateur' => '1.3.1.1',
            'description' => 'Taux de réalisation du plan de travail du CCLBCFT',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);


        $ind19 = Indicateur::create([
            'code_indicateur' => '1.3.1.2',
            'description' => 'Nombre de sessions de formation organisées pour les membres du CCLBCFT',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);

        $ind20 = Indicateur::create([
            'code_indicateur' => '1.3.1.3',
            'description' => 'Taux de membres du CCLBCFT formés',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);

        $ind21 = Indicateur::create([
            'code_indicateur' => '1.3.1.4',
            'description' => 'Nombre de réunions tenues par le CCLBCFT',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);


        $ind22 = Indicateur::create([
            'code_indicateur' => '1.3.1.5',
            'description' => 'Taux de participation aux réunions du CCLBCFT ',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);


        $ind23 = Indicateur::create([
            'code_indicateur' => '1.3.2.1',
            'description' => 'Nombre d’accords signés',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 9
        ]);


        $ind24 = Indicateur::create([
            'code_indicateur' => '1.3.2.2',
            'description' => 'Taux d’opérationnalisation des accords signés ',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 9
        ]);

        $ind25 = Indicateur::create([
            'code_indicateur' => '1.3.3.1',
            'description' => 'Systématicité de l’évaluation de la coordination',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 10
        ]);


        $ind26 = Indicateur::create([
            'code_indicateur' => '1.3.3.2',
            'description' => 'Systématicité de l’évaluation de la coopération',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 10
        ]);
    }
}
