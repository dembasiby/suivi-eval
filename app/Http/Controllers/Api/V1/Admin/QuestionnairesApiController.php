<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use App\Http\Resources\Admin\QuestionnaireResource;
use App\Models\Questionnaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionnairesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questionnaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionnaireResource(Questionnaire::with(['questions', 'organisation', 'team'])->get());
    }

    public function store(StoreQuestionnaireRequest $request)
    {
        $questionnaire = Questionnaire::create($request->all());
        $questionnaire->questions()->sync($request->input('questions', []));

        return (new QuestionnaireResource($questionnaire))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionnaireResource($questionnaire->load(['questions', 'organisation', 'team']));
    }

    public function update(UpdateQuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->all());
        $questionnaire->questions()->sync($request->input('questions', []));

        return (new QuestionnaireResource($questionnaire))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Questionnaire $questionnaire)
    {
        abort_if(Gate::denies('questionnaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionnaire->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
