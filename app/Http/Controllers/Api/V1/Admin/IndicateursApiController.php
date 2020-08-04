<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndicateurRequest;
use App\Http\Requests\UpdateIndicateurRequest;
use App\Http\Resources\Admin\IndicateurResource;
use App\Models\Indicateur;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndicateursApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('indicateur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndicateurResource(Indicateur::with(['probleme_central', 'extrant', 'organisations', 'team'])->get());
    }

    public function store(StoreIndicateurRequest $request)
    {
        $indicateur = Indicateur::create($request->all());
        $indicateur->organisations()->sync($request->input('organisations', []));

        return (new IndicateurResource($indicateur))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndicateurResource($indicateur->load(['probleme_central', 'extrant', 'organisations', 'team']));
    }

    public function update(UpdateIndicateurRequest $request, Indicateur $indicateur)
    {
        $indicateur->update($request->all());
        $indicateur->organisations()->sync($request->input('organisations', []));

        return (new IndicateurResource($indicateur))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateur->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
