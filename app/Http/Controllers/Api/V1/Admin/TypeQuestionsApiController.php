<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeQuestionRequest;
use App\Http\Requests\UpdateTypeQuestionRequest;
use App\Http\Resources\Admin\TypeQuestionResource;
use App\Models\TypeQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeQuestionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('type_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeQuestionResource(TypeQuestion::all());
    }

    public function store(StoreTypeQuestionRequest $request)
    {
        $typeQuestion = TypeQuestion::create($request->all());

        return (new TypeQuestionResource($typeQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TypeQuestion $typeQuestion)
    {
        abort_if(Gate::denies('type_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeQuestionResource($typeQuestion);
    }

    public function update(UpdateTypeQuestionRequest $request, TypeQuestion $typeQuestion)
    {
        $typeQuestion->update($request->all());

        return (new TypeQuestionResource($typeQuestion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TypeQuestion $typeQuestion)
    {
        abort_if(Gate::denies('type_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeQuestion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
