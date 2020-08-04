<?php

use App\Models\Extrant;
use Illuminate\Database\Seeder;

class ExtrantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Effet Immediat 1
        Extrant::create([
            'code_extrant' => 'Extrant 1.1.1',
            'description' => 'La nouvelle stratégie est adoptée et diffusée',
            'effet_immediat_id' => 1
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 1.1.2',
            'description' => 'Les parties intéressées pertinentes sont sensibilisées sur la nouvelle stratégie',
            'effet_immediat_id' => 1
        ]);

        // Effet Immediat 2
        Extrant::create([
            'code_extrant' => 'Extrant 1.2.1',
            'description' => 'Les textes d’application de la loi 2018-03 sont pris',
            'effet_immediat_id' => 2
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 1.2.2',
            'description' => 'Les conventions internationales applicables sont ratifiées et mises en œuvre de manière complète',
            'effet_immediat_id' => 2
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 1.2.3',
            'description' => 'Une législation pour les constructions juridiques est mise en place',
            'effet_immediat_id' => 2
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 1.2.4',
            'description' => 'Le financement du terrorisme est incriminé de manière complète',
            'effet_immediat_id' => 2
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 1.2.5',
            'description' => 'Une veille juridique est menée',
            'effet_immediat_id' => 2
        ]);

        // Effet Immediat 3
        Extrant::create([
            'code_extrant' => 'Extrant 1.3.1',
            'description' => 'La coordination nationale est assurée',
            'effet_immediat_id' => 3
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 1.3.2',
            'description' => 'La coopération entre acteurs nationaux est assurée',
            'effet_immediat_id' => 3
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 1.3.3',
            'description' => 'La coordination et la coopération sont évaluées périodiquement',
            'effet_immediat_id' => 3
        ]);

        // Effet Immediat 4
        Extrant::create([
            'code_extrant' => 'Extrant 2.1.1',
            'description' => 'Les assujettis évaluent leurs risques',
            'effet_immediat_id' => 4
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 2.1.2',
            'description' => 'Des programmes de prévention sont élaborés et/ou révisés',
            'effet_immediat_id' => 4
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 2.1.3',
            'description' => 'Les procédures de contrôle interne sont élaborées et/ou révisées et mises en œuvre',
            'effet_immediat_id' => 4
        ]);

        // Effet Immediat 5
        Extrant::create([
            'code_extrant' => 'Extrant 2.2.1',
            'description' => 'Les autorités sont désignées puis les procédures de contrôle et de supervision sont élaborées et/ou révisées',
            'effet_immediat_id' => 5
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 2.2.2',
            'description' => 'Le contrôle et la supervision sont mis en œuvre',
            'effet_immediat_id' => 5
        ]);

        // Effet Immediat 6
        Extrant::create([
            'code_extrant' => 'Extrant 3.1.1',
            'description' => 'Les capacités opérationnelles de la CENTIF sont renforcées',
            'effet_immediat_id' => 6
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 3.1.2',
            'description' => 'Les enquêtes parallèles sont intensifiées',
            'effet_immediat_id' => 6
        ]);

       // Effet Immediat 7
        Extrant::create([
            'code_extrant' => 'Extrant 3.2.1',
            'description' => 'Les enquêtes patrimoniales sont systématisées',
            'effet_immediat_id' => 7
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 3.2.2',
            'description' => 'Les poursuites et les sanctions pénales sont intensifiées',
            'effet_immediat_id' => 7
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 3.2.3',
            'description' => 'Les sanctions pénales sont systématisées et renforcées',
            'effet_immediat_id' => 7
        ]);

        // Effet Immediat 8
        Extrant::create([
            'code_extrant' => 'Extrant 3.3.1',
            'description' => 'Le mécanisme de mise en œuvre de sanctions financières ciblées est mis en place',
            'effet_immediat_id' => 8
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 3.3.2',
            'description' => 'Le mécanisme de confiscation est amélioré',
            'effet_immediat_id' => 8
        ]);

        // Effet Immediat 9
        Extrant::create([
            'code_extrant' => 'Extrant 4.1.1',
            'description' => 'La coopération entre Cellules de renseignement financier (CRF) est renforcée',
            'effet_immediat_id' => 9
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 4.1.2',
            'description' => 'La coopération entre autorités de contrôle et de supervision est renforcée',
            'effet_immediat_id' => 9
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 4.1.3',
            'description' => 'La coopération entre administrations (fiscale et douanière notamment) est renforcée',
            'effet_immediat_id' => 9
        ]);

        // Effet Immediat 10
        Extrant::create([
            'code_extrant' => 'Extrant 4.2.1',
            'description' => 'Les accords de coopération sont évalués',
            'effet_immediat_id' => 10
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 4.2.2',
            'description' => 'La coopération entre autorités d’enquête est renforcée',
            'effet_immediat_id' => 10
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 4.2.3',
            'description' => 'La mise en œuvre de l’entraide judiciaire est renforcée',
            'effet_immediat_id' => 10
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 4.2.4',
            'description' => 'La mise en œuvre de l’extradition est renforcée',
            'effet_immediat_id' => 10
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 4.2.5',
            'description' => 'Le mécanisme de transfert de poursuites est mis en œuvre',
            'effet_immediat_id' => 10
        ]);

        // Effet Immediat 11
        Extrant::create([
            'code_extrant' => 'Extrant 5.1.1',
            'description' => 'Un cadre de coopération entre acteurs est défini',
            'effet_immediat_id' => 11
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 5.1.2',
            'description' => 'Un dispositif simplifié et sécurisé de reporting et d’analyse des statistiques est mis en place',
            'effet_immediat_id' => 11
        ]);

        // Effet Immediat 12
        Extrant::create([
            'code_extrant' => 'Extrant 5.2.1',
            'description' => 'Des rapports statistiques sont produits',
            'effet_immediat_id' => 12
        ]);

        Extrant::create([
            'code_extrant' => 'Extrant 5.2.2',
            'description' => 'Les rapports statistiques produits sont diffusés',
            'effet_immediat_id' => 12
        ]);
    }
}
