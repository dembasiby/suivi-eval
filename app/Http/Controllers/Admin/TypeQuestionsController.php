<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypeQuestionRequest;
use App\Http\Requests\StoreTypeQuestionRequest;
use App\Http\Requests\UpdateTypeQuestionRequest;
use App\Models\TypeQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeQuestionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('type_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeQuestions = TypeQuestion::all();

        return view('admin.typeQuestions.index', compact('typeQuestions'));
    }

    public function create()
    {
        abort_if(Gate::denies('type_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeQuestions.create');
    }

    public function store(StoreTypeQuestionRequest $request)
    {
        $typeQuestion = TypeQuestion::create($request->all());

        return redirect()->route('admin.type-questions.index');
    }

    public function edit(TypeQuestion $typeQuestion)
    {
        abort_if(Gate::denies('type_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeQuestions.edit', compact('typeQuestion'));
    }

    public function update(UpdateTypeQuestionRequest $request, TypeQuestion $typeQuestion)
    {
        $typeQuestion->update($request->all());

        return redirect()->route('admin.type-questions.index');
    }

    public function show(TypeQuestion $typeQuestion)
    {
        abort_if(Gate::denies('type_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeQuestions.show', compact('typeQuestion'));
    }

    public function destroy(TypeQuestion $typeQuestion)
    {
        abort_if(Gate::denies('type_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeQuestionRequest $request)
    {
        TypeQuestion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
