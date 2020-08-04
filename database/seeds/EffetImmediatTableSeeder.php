<?php

use App\Models\EffetImmediat;
use Illuminate\Database\Seeder;

class EffetImmediatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Effet intermediaire 1
        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 1.1',
            'description' => 'Renforcer la politique',
            'effet_intermediaire_id' => 1
        ]);

        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 1.2',
            'description' => 'Renforcer le cadre juridique',
            'effet_intermediaire_id' => 1
        ]);

        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 1.3',
            'description' => 'Renforcer le cadre institutionnel',
            'effet_intermediaire_id' => 1
        ]);

        // Effet intermediaire 2
        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 2.1',
            'description' => 'Assurer la mise en œuvre des mesures préventives par les assujettis',
            'effet_intermediaire_id' => 2
        ]);

        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 2.2',
            'description' => 'Assurer le contrôle et la supervision des activités des assujettis',
            'effet_intermediaire_id' => 2
        ]);

        // Effet intermediaire 3
        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 3.1',
            'description' => 'Renforcer le dispositif de détection',
            'effet_intermediaire_id' => 3
        ]);

        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 3.2',
            'description' => 'Systématiser les enquêtes patrimoniales et intensifier les poursuites et sanctions pénales',
            'effet_intermediaire_id' => 3
        ]);

        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 3.3',
            'description' => 'Priver les délinquants des produits de leurs activités illicites',
            'effet_intermediaire_id' => 3
        ]);

        // Effet intermediaire 4
        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 4.1',
            'description' => 'Renforcer la coopération administrative',
            'effet_intermediaire_id' => 4
        ]);

        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 4.2',
            'description' => 'Renforcer la coopération judiciaire',
            'effet_intermediaire_id' => 4
        ]);

        // Effet intermediaire 5
        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 5.1',
            'description' => 'Mettre en place un dispositif de collecte des données',
            'effet_intermediaire_id' => 5
        ]);

        EffetImmediat::create([
            'code_effet_immediat' => 'Effet immédiat 5.2',
            'description' => 'Assurer le fonctionnement du dispositif',
            'effet_intermediaire_id' => 5
        ]);

    }
}
