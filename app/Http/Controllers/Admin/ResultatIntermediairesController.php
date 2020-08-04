<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResultatIntermediaireRequest;
use App\Http\Requests\StoreResultatIntermediaireRequest;
use App\Http\Requests\UpdateResultatIntermediaireRequest;
use App\Models\ResultatIntermediaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResultatIntermediairesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('resultat_intermediaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultatIntermediaires = ResultatIntermediaire::all();

        return view('admin.resultatIntermediaires.index', compact('resultatIntermediaires'));
    }

    public function create()
    {
        abort_if(Gate::denies('resultat_intermediaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resultatIntermediaires.create');
    }

    public function store(StoreResultatIntermediaireRequest $request)
    {
        $resultatIntermediaire = ResultatIntermediaire::create($request->all());

        return redirect()->route('admin.resultat-intermediaires.index');
    }

    public function edit(ResultatIntermediaire $resultatIntermediaire)
    {
        abort_if(Gate::denies('resultat_intermediaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resultatIntermediaires.edit', compact('resultatIntermediaire'));
    }

    public function update(UpdateResultatIntermediaireRequest $request, ResultatIntermediaire $resultatIntermediaire)
    {
        $resultatIntermediaire->update($request->all());

        return redirect()->route('admin.resultat-intermediaires.index');
    }

    public function show(ResultatIntermediaire $resultatIntermediaire)
    {
        abort_if(Gate::denies('resultat_intermediaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultatIntermediaire->load('resultatIntermediaireProblemeCentrals');

        return view('admin.resultatIntermediaires.show', compact('resultatIntermediaire'));
    }

    public function destroy(ResultatIntermediaire $resultatIntermediaire)
    {
        abort_if(Gate::denies('resultat_intermediaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultatIntermediaire->delete();

        return back();
    }

    public function massDestroy(MassDestroyResultatIntermediaireRequest $request)
    {
        ResultatIntermediaire::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
