<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\UpdateOrganisationRequest;
use App\Http\Resources\Admin\OrganisationResource;
use App\Models\Organisation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganisationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organisation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganisationResource(Organisation::all());
    }

    public function store(StoreOrganisationRequest $request)
    {
        $organisation = Organisation::create($request->all());

        return (new OrganisationResource($organisation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganisationResource($organisation);
    }

    public function update(UpdateOrganisationRequest $request, Organisation $organisation)
    {
        $organisation->update($request->all());

        return (new OrganisationResource($organisation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organisation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
