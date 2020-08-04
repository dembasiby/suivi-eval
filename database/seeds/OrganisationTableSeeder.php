<?php

use App\Models\Team;
use App\Models\Organisation;
use Illuminate\Database\Seeder;

class OrganisationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/*------------------------------------------------------------------------/
		|
		| EQUIPES
		|__________________________________________________________________________*/ 
		
		Team::create([ 'name' => 'Axe Stratégique 1' ]);
		Team::create([ 'name' => 'Axe Stratégique 2' ]);
		Team::create([ 'name' => 'Axe Stratégique 3' ]);
		Team::create([ 'name' => 'Axe Stratégique 4' ]);
		Team::create([ 'name' => 'Axe Stratégique 5' ]);
		
		
		/*------------------------------------------------------------------------/
		|
		| ORGANISATIONS
		|__________________________________________________________________________*/ 
		
        Organisation::create([
            'nom' => 'Cellule Nationale de Traitement des Informations Financières (CENTIF)',
            'sigle' => 'CENTIF'
        ]);

        Organisation::create([
            'nom' => 'Banque Centrale des Epargnetats de l\'Afrique de l\'Ouest',
            'sigle' => 'BCEAO'
        ]);

        Organisation::create([
            'nom' => 'Conférence Interafricaine des Marchés d\'Assurance (CIMA)',
            'sigle' => 'CIMA'
        ]);

        Organisation::create([
            'nom' => 'Conseil Régional de l\'Epargne Publique et des Marchés Financiers',
            'sigle' => 'CREPMF'
        ]);

        Organisation::create([
            'nom' => 'BC-UEMOA',
            'sigle' => 'BC-UEMOA'
        ]);

        Organisation::create([
            'nom' => 'Ministère de la Justice (MJ)',
            'sigle' => 'MJ'
        ]);

        Organisation::create([
            'nom' => 'Ministère des Finances et du Budget (MFB)',
            'sigle' => 'MFB'
        ]);

        Organisation::create([
            'nom' => 'Ministère des Affaires étrangères (MAE)',
            'sigle' => 'MAE'
        ]);

        Organisation::create([
            'nom' => 'Comité National ITIE Sénégal',
            'sigle' => 'CN-ITIE'
        ]);

        Organisation::create([
            'nom' => 'Organisation pour l\'Harmonisation en Afrique du Droit des Affaires',
            'sigle' => 'OHADA'
        ]);

        Organisation::create([
            'nom' => 'Direction des Affaires criminelles et des Grâces (DACG)',
            'sigle' => 'DACG'
        ]);
    }
}
