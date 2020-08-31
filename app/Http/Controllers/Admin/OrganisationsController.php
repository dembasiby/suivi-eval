<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrganisationRequest;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\UpdateOrganisationRequest;
use App\Models\Organisation;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganisationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organisation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organisations = Organisation::all();

        return view('admin.organisations.index', compact('organisations'));
    }

    public function create()
    {
        abort_if(Gate::denies('organisation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id');
        return view('admin.organisations.create', compact('teams'));
    }

    public function store(StoreOrganisationRequest $request)
    {
        $organisation = Organisation::create($request->all());

        return redirect()->route('admin.organisations.index');
    }

    public function edit(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = Team::all()->pluck('name', 'id');

        return view('admin.organisations.edit', compact('organisation', 'teams'));
    }

    public function update(UpdateOrganisationRequest $request, Organisation $organisation)
    {
        $organisation->update($request->all());

        return redirect()->route('admin.organisations.index');
    }

    public function show(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organisation->load('teams');
        return view('admin.organisations.show', compact('organisation'));
    }

    public function destroy(Organisation $organisation)
    {
        abort_if(Gate::denies('organisation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organisation->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganisationRequest $request)
    {
        Organisation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
