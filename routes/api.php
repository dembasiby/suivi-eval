<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Organisations
    Route::apiResource('organisations', 'OrganisationsApiController');

    // Effet Intermediaires
    Route::apiResource('effet-intermediaires', 'EffetIntermediairesApiController');

    // Effet Immediats
    Route::apiResource('effet-immediats', 'EffetImmediatsApiController');

    // Extrants
    Route::apiResource('extrants', 'ExtrantsApiController');

    // Resultat Intermediaires
    Route::apiResource('resultat-intermediaires', 'ResultatIntermediairesApiController');

    // Probleme Centrals
    Route::apiResource('probleme-centrals', 'ProblemeCentralsApiController');

    // Indicateurs
    Route::apiResource('indicateurs', 'IndicateursApiController');

    // Type Questions
    Route::apiResource('type-questions', 'TypeQuestionsApiController');

    // Questions
    Route::apiResource('questions', 'QuestionsApiController');

    // Questionnaires
    Route::apiResource('questionnaires', 'QuestionnairesApiController');

    // Reponses
    Route::apiResource('reponses', 'ReponsesApiController');
});
