<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEffetIntermediaireRequest;
use App\Http\Requests\UpdateEffetIntermediaireRequest;
use App\Http\Resources\Admin\EffetIntermediaireResource;
use App\Models\EffetIntermediaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EffetIntermediairesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('effet_intermediaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EffetIntermediaireResource(EffetIntermediaire::all());
    }

    public function store(StoreEffetIntermediaireRequest $request)
    {
        $effetIntermediaire = EffetIntermediaire::create($request->all());

        return (new EffetIntermediaireResource($effetIntermediaire))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EffetIntermediaireResource($effetIntermediaire);
    }

    public function update(UpdateEffetIntermediaireRequest $request, EffetIntermediaire $effetIntermediaire)
    {
        $effetIntermediaire->update($request->all());

        return (new EffetIntermediaireResource($effetIntermediaire))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetIntermediaire->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
