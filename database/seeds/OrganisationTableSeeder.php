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
		
		$team1 = Team::create([ 'name' => 'Axe Stratégique 1' ]);
		$team2 = Team::create([ 'name' => 'Axe Stratégique 2' ]);
		$team3 = Team::create([ 'name' => 'Axe Stratégique 3' ]);
		$team4 = Team::create([ 'name' => 'Axe Stratégique 4' ]);
		$team5 = Team::create([ 'name' => 'Axe Stratégique 5' ]);
		
		
		/*------------------------------------------------------------------------/
		|
		| ORGANISATIONS
		|__________________________________________________________________________*/ 
		
        Organisation::create([
            'nom' => 'Cellule Nationale de Traitement des Informations Financières (CENTIF)',
            'sigle' => 'CENTIF'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Banque Centrale des Epargnetats de l\'Afrique de l\'Ouest',
            'sigle' => 'BCEAO'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Conférence Interafricaine des Marchés d\'Assurance (CIMA)',
            'sigle' => 'CIMA'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Conseil Régional de l\'Epargne Publique et des Marchés Financiers',
            'sigle' => 'CREPMF'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'BC-UEMOA',
            'sigle' => 'BC-UEMOA'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Ministère de la Justice (MJ)',
            'sigle' => 'MJ'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Ministère des Finances et du Budget (MFB)',
            'sigle' => 'MFB'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Ministère des Affaires étrangères (MAE)',
            'sigle' => 'MAE'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Comité National ITIE Sénégal',
            'sigle' => 'CN-ITIE'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Organisation pour l\'Harmonisation en Afrique du Droit des Affaires',
            'sigle' => 'OHADA'
        ])->teams()->attach($team1);

        Organisation::create([
            'nom' => 'Direction des Affaires criminelles et des Grâces (DACG)',
            'sigle' => 'DACG'
        ])->teams()->attach($team1);
    }
}
