<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProblemeCentralRequest;
use App\Http\Requests\UpdateProblemeCentralRequest;
use App\Http\Resources\Admin\ProblemeCentralResource;
use App\Models\ProblemeCentral;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProblemeCentralsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('probleme_central_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProblemeCentralResource(ProblemeCentral::with(['resultat_intermediaire'])->get());
    }

    public function store(StoreProblemeCentralRequest $request)
    {
        $problemeCentral = ProblemeCentral::create($request->all());

        return (new ProblemeCentralResource($problemeCentral))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProblemeCentral $problemeCentral)
    {
        abort_if(Gate::denies('probleme_central_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProblemeCentralResource($problemeCentral->load(['resultat_intermediaire']));
    }

    public function update(UpdateProblemeCentralRequest $request, ProblemeCentral $problemeCentral)
    {
        $problemeCentral->update($request->all());

        return (new ProblemeCentralResource($problemeCentral))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProblemeCentral $problemeCentral)
    {
        abort_if(Gate::denies('probleme_central_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $problemeCentral->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
