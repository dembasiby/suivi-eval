<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
	if (session('status')) {
		return redirect()->route('admin.home')->with('status', session('status'));
	}

	return redirect()->route('admin.home');
});

Auth::routes();
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	// Permissions
	Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
	Route::resource('permissions', 'PermissionsController');

	// Roles
	Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
	Route::resource('roles', 'RolesController');

	// Users
	Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
	Route::resource('users', 'UsersController');

	// Teams
	Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
	Route::resource('teams', 'TeamController');

	// Organisations
	Route::delete('organisations/destroy', 'OrganisationsController@massDestroy')->name('organisations.massDestroy');
	Route::resource('organisations', 'OrganisationsController');

	// Effet Intermediaires
	Route::delete('effet-intermediaires/destroy', 'EffetIntermediairesController@massDestroy')->name('effet-intermediaires.massDestroy');
	Route::resource('effet-intermediaires', 'EffetIntermediairesController');

	// Effet Immediats
	Route::delete('effet-immediats/destroy', 'EffetImmediatsController@massDestroy')->name('effet-immediats.massDestroy');
	Route::resource('effet-immediats', 'EffetImmediatsController');

	// Extrants
	Route::delete('extrants/destroy', 'ExtrantsController@massDestroy')->name('extrants.massDestroy');
	Route::resource('extrants', 'ExtrantsController');

	// Resultat Intermediaires
	Route::delete('resultat-intermediaires/destroy', 'ResultatIntermediairesController@massDestroy')->name('resultat-intermediaires.massDestroy');
	Route::resource('resultat-intermediaires', 'ResultatIntermediairesController');

	// Probleme Centrals
	Route::delete('probleme-centrals/destroy', 'ProblemeCentralsController@massDestroy')->name('probleme-centrals.massDestroy');
	Route::resource('probleme-centrals', 'ProblemeCentralsController');

	// Indicateurs
	Route::delete('indicateurs/destroy', 'IndicateursController@massDestroy')->name('indicateurs.massDestroy');
	Route::resource('indicateurs', 'IndicateursController');

	// Type Questions
	Route::delete('type-questions/destroy', 'TypeQuestionsController@massDestroy')->name('type-questions.massDestroy');
	Route::resource('type-questions', 'TypeQuestionsController');

	// Questions
	Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
	Route::resource('questions', 'QuestionsController');

	// Questionnaires
	Route::delete('questionnaires/destroy', 'QuestionnairesController@massDestroy')->name('questionnaires.massDestroy');
	Route::get('questionnaires/reponses/{questionnaire}/create', 'QuestionnairesController@createReponses')
		->name('questionnaires.createReponses');
	Route::get('questionnaires/reponses/{questionnaire}/edit', 'QuestionnairesController@editReponses')
		->name('questionnaires.editReponses');
	Route::post('questionnaires/reponses/{questionnaire}', 'QuestionnairesController@storeReponses')
		->name('questionnaires.storeReponses');
	Route::put('questionnaires/reponses/{questionnaire}/update', 'QuestionnairesController@updateReponses')
		->name('questionnaires.updateReponses');
	Route::get('questionnaires/reponses/{questionnaire}/control', 'QuestionnairesController@controlReponses')
		->name('questionnaires.controlReponses');
	Route::get('questionnaires/reponses/{questionnaire}/validate', 'QuestionnairesController@validateReponses')
		->name('questionnaires.validateReponses');
	Route::patch('questionnaires/reponses/{questionnaire}/updateStatus', 'QuestionnairesController@updateStatus')
		->name('questionnaires.updateStatus');
	Route::resource('questionnaires', 'QuestionnairesController');

	// Reponses
	Route::delete('reponses/destroy', 'ReponsesController@massDestroy')->name('reponses.massDestroy');
	Route::resource('reponses', 'ReponsesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
	// Change password
	if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
		Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
		Route::post('password', 'ChangePasswordController@update')->name('password.update');
	}
});
