<?php

use App\Models\EffetIntermediaire;
use Illuminate\Database\Seeder;

class EffetIntermediaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EffetIntermediaire::create([
            'code' => 'Effet intermediaire 1', 
            'description' => 'Renforcement de la politique et du cadre juridique et institutionnel'
            /* 'coordonnateur_id' => xx */
            /* 'point_focal_id' => xx */
        ]);

        EffetIntermediaire::create([
            'code' => 'Effet intermediaire 2', 
            'description' => 'Mise en œuvre des obligations des assujettis et des autorités de contrôle et de supervision'
            /* 'coordonnateur_id' => xx */
            /* 'point_focal_id' => xx */
        ]);
        
        EffetIntermediaire::create([
            'code' => 'Effet intermediaire 3', 
            'description' => 'Mise en œuvre de mécanismes de détection, d’enquêtes, de poursuites et de sanctions pénales'
            /* 'coordonnateur_id' => xx */
            /* 'point_focal_id' => xx */
        ]);
        EffetIntermediaire::create([
            'code' => 'Effet intermediaire 4', 
            'description' => 'Renforcement de la coopération internationale'        ]);
            /* 'coordonnateur_id' => xx */
            /* 'point_focal_id' => xx */

        EffetIntermediaire::create([
            'code' => 'Effet intermediaire 5', 
            'description' => 'Maîtrise des statistiques sur la LBC/FT'
            /* 'coordonnateur_id' => xx */
            /* 'point_focal_id' => xx */
        ]);
        
    }
}
