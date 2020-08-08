<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionnaireRequest;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use App\Http\Requests\UpdateReponseRequest;
use App\Models\Organisation;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Questionnaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionnairesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questionnaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionnaires = Questionnaire::all();

        return view('admin.questionnaires.index', compact('questionnaires'));
    }

    public function create()
    {
        abort_if(Gate::denies('questionnaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('description', 'id');

        $organisations = Organisation::all()->pluck('sigle', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.questionnaires.create', compact('questions', 'organisations'));
    }

    public function store(StoreQuestionnaireRequest $request)
    {
        
		$organisations = Organisation::all();
		$data = $request->all();
		
		foreach($organisations as $organisation)
		{
			$data['organisation_id'] = $organisation->id;
		
			$questionnaire = $organisation->questionnaires()->create($data);
			
			foreach($organisation->indicateurs as $indicateur) {
				$questionnaire->questions()->attach($indicateur->indicateurQuestions);
			}
				
		}
		
        return redirect()->route('admin.questionnaires.index');
    }

    public function edit(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		
		// Un questionnaire n'appartient qu'a une seulle organisation.
		// Un questionnaire a deja ses questions.

        // $organisations = Organisation::all()->pluck('sigle', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $questionnaire->load('questions', 'organisation');
        $questions = $questionnaire->questions()->pluck('description', 'id');
		$organisation = $questionnaire->organisation;

        return view('admin.questionnaires.edit', compact('questions', 'organisation', 'questionnaire'));
    }

    public function update(UpdateQuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->all());
        $questionnaire->questions()->sync($request->input('questions', []));

        return redirect()->route('admin.questionnaires.index');
    }

    public function show(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionnaire->load('questions', 'organisation');
		
        return view('admin.questionnaires.show', compact('questionnaire'));
    }

    public function destroy(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionnaire->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionnaireRequest $request)
    {
        Questionnaire::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
	
    /**
     * undocumented function
     *
     * @return void
     */
    public function createReponses(Questionnaire $questionnaire)
    {
     	abort_if(Gate::denies('reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		
		$questionnaire->load('questions');
		
		return view('admin.questionnaires.createReponses', compact('questionnaire'));
    }
	
    /**
     * undocumented function
     *
     * @return void
     */
    public function storeReponses(Questionnaire $questionnaire)
    {
      abort_if(Gate::denies('reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		
      try {
        $data = request()->validate([
 	           'reponses.*.questionnaire_id' => 'required',
 	           'reponses.*.question_id' => 'required',
 	           'reponses.*.description' => 'required',
 	         ]);

		$questionnaire->reponses()->createMany($data['reponses']);

        // $questionnaire = Questionnaire::findOrFail($questionnaire_id);
        // $questionnaire->statut = 2;
        // $questionnaire->save();

        return redirect()->route('admin.questionnaires.index');
      } catch (Exception $e) {
        return back()->withInput()
          ->withErrors(['unexpected_error' => "Erreur d'enregistrement des réponses du questionnaie."]);
      }
    }
	
    /**
     * undocumented function
     *
     * @return void
     */
    public function editReponses(Questionnaire $questionnaire)
    {
     	abort_if(Gate::denies('reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      if (count($questionnaire->reponses) > 0) {
        $questionnaire->load('questions', 'reponses');
		
		    return view('admin.questionnaires.editReponses', compact('questionnaire'));
      } else {
        return redirect()->route('admin.questionnaires.index');
      }
		
    }
	
    /**
     * undocumented function
     *
     * @return void
     */
    public function updateReponses(UpdateReponseRequest $request, Questionnaire $questionnaire)
    {
      abort_if(Gate::denies('reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		
        try {         
			foreach ($request['description'] as $key => $value) {
        $questionnaire->reponses[$key]->update([
          'description' => $value,
        ]);
			}
			

			// $questionnaire = Questionnaire::findOrFail($questionnaire_id);
			// $questionnaire->statut = 2;
			// $questionnaire->save();

        return redirect()->route('admin.questionnaires.index');
      } catch (Exception $e) {
        return back()->withInput()
          ->withErrors(['unexpected_error' => "Erreur d'enregistrement des réponses du questionnaie."]);
      }
    }
	
}
