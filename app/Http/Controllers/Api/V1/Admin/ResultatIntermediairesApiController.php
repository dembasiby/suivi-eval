<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResultatIntermediaireRequest;
use App\Http\Requests\UpdateResultatIntermediaireRequest;
use App\Http\Resources\Admin\ResultatIntermediaireResource;
use App\Models\ResultatIntermediaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResultatIntermediairesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('resultat_intermediaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResultatIntermediaireResource(ResultatIntermediaire::all());
    }

    public function store(StoreResultatIntermediaireRequest $request)
    {
        $resultatIntermediaire = ResultatIntermediaire::create($request->all());

        return (new ResultatIntermediaireResource($resultatIntermediaire))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ResultatIntermediaire $resultatIntermediaire)
    {
        abort_if(Gate::denies('resultat_intermediaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResultatIntermediaireResource($resultatIntermediaire);
    }

    public function update(UpdateResultatIntermediaireRequest $request, ResultatIntermediaire $resultatIntermediaire)
    {
        $resultatIntermediaire->update($request->all());

        return (new ResultatIntermediaireResource($resultatIntermediaire))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ResultatIntermediaire $resultatIntermediaire)
    {
        abort_if(Gate::denies('resultat_intermediaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultatIntermediaire->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
