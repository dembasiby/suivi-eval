<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Indicateur;
use App\Models\Question;
use App\Models\TypeQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all();

        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type_questions = TypeQuestion::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $indicateurs = Indicateur::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.questions.create', compact('type_questions', 'indicateurs'));
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->all());

        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type_questions = TypeQuestion::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $indicateurs = Indicateur::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $question->load('type_question', 'indicateur', 'team');

        return view('admin.questions.edit', compact('type_questions', 'indicateurs', 'question'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->route('admin.questions.index');
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('type_question', 'indicateur', 'team');

        return view('admin.questions.show', compact('question'));
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
