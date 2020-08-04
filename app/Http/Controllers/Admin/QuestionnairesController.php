<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionnaireRequest;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use App\Models\Organisation;
use App\Models\Question;
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
        $questionnaire = Questionnaire::create($request->all());
        $questionnaire->questions()->sync($request->input('questions', []));

        return redirect()->route('admin.questionnaires.index');
    }

    public function edit(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('description', 'id');

        $organisations = Organisation::all()->pluck('sigle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionnaire->load('questions', 'organisation', 'team');

        return view('admin.questionnaires.edit', compact('questions', 'organisations', 'questionnaire'));
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

        $questionnaire->load('questions', 'organisation', 'team');

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
}
