<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEffetImmediatRequest;
use App\Http\Requests\UpdateEffetImmediatRequest;
use App\Http\Resources\Admin\EffetImmediatResource;
use App\Models\EffetImmediat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EffetImmediatsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('effet_immediat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EffetImmediatResource(EffetImmediat::with(['effet_intermediaire'])->get());
    }

    public function store(StoreEffetImmediatRequest $request)
    {
        $effetImmediat = EffetImmediat::create($request->all());

        return (new EffetImmediatResource($effetImmediat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(EffetImmediat $effetImmediat)
    {
        abort_if(Gate::denies('effet_immediat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EffetImmediatResource($effetImmediat->load(['effet_intermediaire']));
    }

    public function update(UpdateEffetImmediatRequest $request, EffetImmediat $effetImmediat)
    {
        $effetImmediat->update($request->all());

        return (new EffetImmediatResource($effetImmediat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(EffetImmediat $effetImmediat)
    {
        abort_if(Gate::denies('effet_immediat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetImmediat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
