<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReponseRequest;
use App\Http\Requests\UpdateReponseRequest;
use App\Http\Resources\Admin\ReponseResource;
use App\Models\Reponse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReponsesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reponse_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReponseResource(Reponse::with(['question', 'questionnaire', 'team'])->get());
    }

    public function store(StoreReponseRequest $request)
    {
        $reponse = Reponse::create($request->all());

        return (new ReponseResource($reponse))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Reponse $reponse)
    {
        abort_if(Gate::denies('reponse_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReponseResource($reponse->load(['question', 'questionnaire', 'team']));
    }

    public function update(UpdateReponseRequest $request, Reponse $reponse)
    {
        $reponse->update($request->all());

        return (new ReponseResource($reponse))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Reponse $reponse)
    {
        abort_if(Gate::denies('reponse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reponse->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
