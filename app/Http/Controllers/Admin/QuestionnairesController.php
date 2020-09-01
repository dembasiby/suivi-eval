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
use Exception;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionnairesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questionnaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (auth()->user()->roles->contains(1)) {
            $questionnaires = Questionnaire::all();
        } elseif (auth()->user()->roles->contains(4)) {
            $questionnaires = Questionnaire::where('organisation_id', auth()->user()->organisation_id)->get();
        } elseif (auth()->user()->roles->contains([2, 3])) {
            $questionnaires = Questionnaire::where('team_id', auth()->user()->team_id)->get();
        }

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

        foreach ($organisations as $organisation) {
            $data['organisation_id'] = $organisation->id;

            foreach ($organisation->teams as $team) {
                $data['team_id'] = $team->id;

                $indicateurs = [];
                foreach ($organisation->indicateurs as $indicateur) {
                    if (($indicateur->team_id == $team->id) && (count($indicateur->indicateurQuestions) > 0)) {
                        $indicateurs[] = $indicateur;
                    }
                }
                if (count($indicateurs) > 0) {
                    $questionnaire = $organisation->questionnaires()->create($data);
                    foreach ($indicateurs as $indicateur) {
                        $questionnaire->questions()->attach($indicateur->indicateurQuestions);
                    }
                }
            }
        }

        return redirect()->route('admin.questionnaires.index');
    }

    public function edit(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $data = $this->getValidatedData();

        // Filter les donnees et enlever toute reponse null
        $donnees = $this->filterForm($data);

        // Enregistrer chaque reponse dans la base de donnees
        foreach ($donnees as $key => $value) {
            $questionnaire->reponses()->create($value['reponses'][$key]);
        }

        $questionnaire->statut = 2;
        $questionnaire->save();

        return redirect()->route('admin.questionnaires.index');
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
            $reponses = $questionnaire->reponses;

            return view('admin.questionnaires.editReponses', compact('questionnaire', 'reponses'));
        } else {
            return redirect()->route('admin.questionnaires.index');
        }
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function updateReponses(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {

            $data = [];

            for ($i = 0; $i < count(request()->all()['description']); $i++) {
                $prev = ($i > 0) ? ($i - 1) : 0;

                $data[] = request()->validate([
                    'description.' . $i   => 'required_unless:description.' . $prev . ',non',
                    'description.' . $i . '.*' => 'required_unless:description.' . $prev . ',non',
                ]);
            }

            $data = $this->filterForUpdate($data);
            foreach ($data as $key => $value) {
                $questionnaire->reponses[$key]->update([
                    'description' => $value['description'][$key],
                ]);
            }

            return redirect()->route('admin.questionnaires.index');
        } catch (Exception $e) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => "Erreur d'enregistrement des réponses du questionnaie."]);
        }
    }

    public function controlReponses(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_control'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (count($questionnaire->reponses) > 0) {
            $questionnaire->load('questions', 'reponses');
            $reponses = $questionnaire->reponses;
        }

        return view('admin.questionnaires.controlReponses', compact('questionnaire', 'reponses'));
    }

    public function validateReponses(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_validate'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (count($questionnaire->reponses) > 0) {
            $questionnaire->load('questions', 'reponses');
            $reponses = $questionnaire->reponses;
        }

        return view('admin.questionnaires.validateReponses', compact('questionnaire', 'reponses'));
    }

    public function updateStatus(Questionnaire $questionnaire)
    {
        $data = request()->validate(['statut' => 'required']);
        $questionnaire->statut = (integer)$data['statut'];

        if ($data['statut'] == 1) {
            Reponse::where('questionnaire_id', '=', $questionnaire->id)->delete();
        }

        $questionnaire->save();

        return redirect()->route('admin.questionnaires.index');
    }

    private function filterForm($data)
    {
        $filteredData = collect($data)->filter(function ($items, $index) {
            $element = $items['reponses'][$index]['description'];

            if (gettype($element) == 'array') {
                foreach ($element as $key => $value) {
                    return $value != null;
                }
            }
            return $element != null;
        });

        return $filteredData;
    }

    private function filterForUpdate($data)
    {
        $filteredData = collect($data)->filter(function ($items, $index) {
            $element = $items['description'][$index];

            if (gettype($element) == 'array') {
                foreach ($element as $key => $value) {
                    return $value != null;
                }
            }
            return $element != null;
        });

        return $filteredData;
    }
    private function getValidatedData()
    {
        $data = [];

        // Valider les donnees soumis
        for ($i = 0; $i < count(request()->all()['reponses']); $i++) {
            $prev = ($i > 0) ? ($i - 1) : 0;

            $data[] = request()->validate([
                'reponses.' . $i . '.questionnaire_id' => 'required',
                'reponses.' . $i . '.question_id' => 'required',
                'reponses.' . $i . '.description' => 'required_unless:reponses.' . $prev . '.description,non',
                'reponses.' . $i . '.description.*' => 'required_unless:reponses.' . $prev . '.description,non',
                'reponses.' . $i . 'description.*.*' => 'required'
            ]);
        }

        return $data;
    }
}
