<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExtrantRequest;
use App\Http\Requests\UpdateExtrantRequest;
use App\Http\Resources\Admin\ExtrantResource;
use App\Models\Extrant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExtrantsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extrant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExtrantResource(Extrant::with(['effet_immediat'])->get());
    }

    public function store(StoreExtrantRequest $request)
    {
        $extrant = Extrant::create($request->all());

        return (new ExtrantResource($extrant))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExtrantResource($extrant->load(['effet_immediat']));
    }

    public function update(UpdateExtrantRequest $request, Extrant $extrant)
    {
        $extrant->update($request->all());

        return (new ExtrantResource($extrant))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extrant->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
