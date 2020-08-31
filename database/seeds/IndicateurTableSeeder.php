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
        $obj = TypeQuestion::create(['type' => 'object']); // tableau 7


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
            'type_question_id' => 7,
            'options' => [
                "Type d'acteurs cibles",
                "Nombre cible",
                "Nombre ayant recu le document"
            ],
            'sub_options' => [
                'Acteurs et parties prenantes nationaux de la LBC/FT',
                'Autorités nationales impliquées dans la LBC/FT',
                'Autorités au niveau supranational (communautaires, internationales)',
                'Partenaires au développement'
            ]
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
            'type_question_id' => 7,
            'options' => ['Période', 'Nombre de sessions prévues', 'Nombre de sessions realisées']
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
            'type_question_id' => 7,
            'options' => ['Période', 'Nombre de cibles prévues', 'Nombre de cibles touchées']
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
            'type_question_id' => 7,
            'options' => [
                'Période',
                "Nombre total d'action de plaidoyers",
                "Nombre total d'autorités ciblées",
                "Nombre total d'autorités touchées"
            ]
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
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre total de textes pris",
                "Type de textes d’application"
            ]
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
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre de revues de conventions pertinentes",
                "Délai de réalisation de la revue par rapport à la convention pertinente ciblée"
            ]
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
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre de conventions internationales pertinentes à ratifier",
                "Nombre de conventions internationales pertinentes effectivement ratifiée"
            ]
        ]);

        Question::create([
            'description' => 'Veuillez lister à l’aide du tableau ci-après les conventions effectivement ratifiées  et leur  implication sur le droit positif',
            'indicateur_id' => $ind9->id,
            'type_question_id' => 7,
            'options' => [
                "Conventions ratifiées",
                "Date de ratification",
                "Implication sur le droit positif"
            ]
        ]);

        $ind10 = Indicateur::create([
            'code_indicateur' => '1.2.3.1',
            'description' => 'Nombre de textes pris pour encadrer les constructions juridiques',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        Question::create([
            'description' => "Veuillez préciser à l'aide du tableau le nombre de textes pris pour encadrer les constructions juridiques ",
            'indicateur_id' => $ind10->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre de textes pris",
                "Nature des textes pris"
            ]
        ]);

        $ind11 = Indicateur::create([
            'code_indicateur' => '1.2.3.2',
            'description' => 'Des mécanismes d’identification des bénéficiaires effectifs PM et CJ élaborés dans les délais',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        Question::create([
            'description' => "Veuillez indiquer à l’aide du tableau ci-après le nombre de mécanismes d’identification des bénéficiaires effectifs des PM et CJ élaborés dans les délais",
            'indicateur_id' => $ind11->id,
            'type_question_id' => 7,
            'options' => [
                "Type d’entités",
                "Nombre de mécanismes d’identification des bénéficiaires effectifs",
                "Date de mise en place des mécanismes"
            ],
            'sub_options' => [
                'PM',
                'CJ',
                'Autres'
            ]
        ]);


        $ind12 = Indicateur::create([
            'code_indicateur' => '1.2.3.3',
            'description' => 'Un registre des bénéficiaires effectifs accessible via une plateforme centrale nationale mis en place dans les délais',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        Question::create([
            'description' => "Un registre des bénéficiaires effectifs est-il accessible via une plateforme centrale nationale ?",
            'indicateur_id' => $ind12->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez indiquer la date de mise en place du registre",
            'indicateur_id' => $ind12->id,
            'type_question_id' => 5
        ]);

        $ind13 = Indicateur::create([
            'code_indicateur' => '1.2.3.4',
            'description' => 'Un plaidoyer auprès de l’OHADA fait dans les délais',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 5
        ]);

        Question::create([
            'description' => "Des actions de plaidoyer auprés de l’OHADA pour la mise en place d’une législation sur les constructions juridiques ont-elles été réalisées?",
            'indicateur_id' => $ind13->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez préciser par période, le nombre d’actions de plaidoyer menées et les dates",
            'indicateur_id' => $ind13->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre total d’actions de plaidoyer",
                "Date"
            ]
        ]);

        $ind14 = Indicateur::create([
            'code_indicateur' => '1.2.4.1',
            'description' => 'Le Code pénal est modifié dans les délais pour incriminer de manière complète le financement du terrorisme',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 6
        ]);

        Question::create([
            'description' => "Un registre des b√©n√©ficiaires effectifs est-il accessible via une plateforme centrale nationale ?",
            'indicateur_id' => $ind14->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez indiquer la date de cette modification",
            'indicateur_id' => $ind14->id,
            'type_question_id' => 5
        ]);

        $ind15 = Indicateur::create([
            'code_indicateur' => '1.2.5.1',
            'description' => 'Un Responsable de veille est désigné dans les délais et ses missions déclinées',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 7
        ]);

        Question::create([
            'description' => "Un Responsable de veille juridique est-il  désigné?",
            'indicateur_id' => $ind15->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez indiquer la date de désignation du responsable",
            'indicateur_id' => $ind15->id,
            'type_question_id' => 5
        ]);

        Question::create([
            'description' => "Si oui, veuillez lister les éléments constitutifs de sa mission",
            'indicateur_id' => $ind15->id,
            'type_question_id' => 6
        ]);

        $ind16 = Indicateur::create([
            'code_indicateur' => '1.2.5.2',
            'description' => 'Nombre de notes d’alerte périodiques produites',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 7
        ]);

        Question::create([
            'description' => "Des notes d’alerte périodiques ont-elles été produites?",
            'indicateur_id' => $ind16->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez préciser par période, le nombre de notes d’alerte et la date de production",
            'indicateur_id' => $ind16->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre de notes d’alerte produites",
                "Dates de production"
            ]
        ]);

        $ind17 = Indicateur::create([
            'code_indicateur' => '1.2.5.3',
            'description' => 'Nombre de rapports périodiques d’alerte produits',
            /* 'frequence_collecte' => 1, */
            'extrant_id' => 7
        ]);

        Question::create([
            'description' => "Des rapports périodiques d’alerte ont-elles été produits?",
            'indicateur_id' => $ind17->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez préciser par période, le nombre de rapports périodiques d’alerte et la date de production",
            'indicateur_id' => $ind17->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre de rapports d’alerte produits",
                "Dates de production"
            ]
        ]);

        $ind18 = Indicateur::create([
            'code_indicateur' => '1.3.1.1',
            'description' => 'Taux de réalisation du plan de travail du CCLBCFT',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);

        Question::create([
            'description' => "Les activités programmées dans le PTA ont-elles été réalisées sur la période ?",
            'indicateur_id' => $ind18->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez préciser, sur la période, le nombre d’activités programmées et celles effectivement réalisées",
            'indicateur_id' => $ind18->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre d’activités programmées dans le PTA",
                "Nombre d’activités réalisées"
            ]
        ]);

        Question::create([
            'description' => "Si toutes les activités prévues sur la période ont été réalisées, veuillez indiquer, de façon synthétique les facteurs de performances",
            'indicateur_id' => $ind18->id,
            'type_question_id' => 6
        ]);

        Question::create([
            'description' => "Veuillez indiquer de façon synthétique les contraintes majeures dans la réalisation des activités programmées",
            'indicateur_id' => $ind18->id,
            'type_question_id' => 6
        ]);


        $ind19 = Indicateur::create([
            'code_indicateur' => '1.3.1.2',
            'description' => 'Nombre de sessions de formation organisées pour les membres du CCLBCFT',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);

        Question::create([
            'description' => "Des sessions de formation ont-elles été organisées pour les membres du CCLBCFT sur la période?",
            'indicateur_id' => $ind19->id,
            'type_question_id' => 4
        ]);

        Question::create([
            'description' => "Si oui, veuillez préciser par trimestre, le nombre d’activités programmées et celles réalisées",
            'indicateur_id' => $ind19->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre de sessions organisées",
                "Nombre de bénéficiaires des sessions"
            ]
        ]);

        Question::create([
            'description' => "Veuillez lister les thématiques des formations organisées pour les membres du CCLBCFT sur la période",
            'indicateur_id' => $ind19->id,
            'type_question_id' => 6
        ]);

        $ind20 = Indicateur::create([
            'code_indicateur' => '1.3.1.3',
            'description' => 'Taux de membres du CCLBCFT formés',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);

        Question::create([
            'description' => "Veuillez indiquer à l’aide du tableau ci-après, le nombre total de membre du comité, le nombre total de membres formés et la date d’organisation des sessions de formation",
            'indicateur_id' => $ind20->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre total de membres du comité",
                "Nombre total de membre formés",
                "Date d’organisation de la session"
            ]
        ]);

        $ind21 = Indicateur::create([
            'code_indicateur' => '1.3.1.4',
            'description' => 'Nombre de réunions tenues par le CCLBCFT',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);

        Question::create([
            'description' => "Veuillez indiquer à l’aide du tableau ci-après, le nombre total de réunions planifiées, le nombre total de réunions de coordination tenues et le délai de tenu des réunions du comité",
            'indicateur_id' => $ind21->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre de réunions planifiées",
                "Nombre de réunions de coordination tenues",
                "Date  de tenue des réunions du comité"
            ]
        ]);


        $ind22 = Indicateur::create([
            'code_indicateur' => '1.3.1.5',
            'description' => 'Taux de participation aux réunions du CCLBCFT ',
            /* 'frequence_collecte' => 4, */
            'extrant_id' => 8
        ]);

        Question::create([
            'description' => "Veuillez préciser, sur la période, le nombre total de membres de droit ayant participé aux réunions du CCLBCFT",
            'indicateur_id' => $ind22->id,
            'type_question_id' => 7,
            'options' => [
                "Période",
                "Nombre total de membres droit",
                "Nombre de membres de droit  ayant participé aux réunions"
            ]
        ]);


        $ind23 = Indicateur::create([
            'code_indicateur' => '1.3.2.1',
            'description' => 'Nombre d’accords signés entre acteurs nationaux',
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
