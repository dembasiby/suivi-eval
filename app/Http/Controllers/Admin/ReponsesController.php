<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReponseRequest;
use App\Http\Requests\StoreReponseRequest;
use App\Http\Requests\UpdateReponseRequest;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReponsesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reponse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reponses = Reponse::all();

        return view('admin.reponses.index', compact('reponses'));
    }

    public function create()
    {
        abort_if(Gate::denies('reponse_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionnaires = Questionnaire::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reponses.create', compact('questions', 'questionnaires'));
    }

    public function store(StoreReponseRequest $request)
    {
        $reponse = Reponse::create($request->all());

        return redirect()->route('admin.reponses.index');
    }

    public function edit(Reponse $reponse)
    {
        abort_if(Gate::denies('reponse_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionnaires = Questionnaire::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reponse->load('question', 'questionnaire', 'team');

        return view('admin.reponses.edit', compact('questions', 'questionnaires', 'reponse'));
    }

    public function update(UpdateReponseRequest $request, Reponse $reponse)
    {
        $reponse->update($request->all());

        return redirect()->route('admin.reponses.index');
    }

    public function show(Reponse $reponse)
    {
        abort_if(Gate::denies('reponse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reponse->load('question', 'questionnaire', 'team');

        return view('admin.reponses.show', compact('reponse'));
    }

    public function destroy(Reponse $reponse)
    {
        abort_if(Gate::denies('reponse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reponse->delete();

        return back();
    }

    public function massDestroy(MassDestroyReponseRequest $request)
    {
        Reponse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
