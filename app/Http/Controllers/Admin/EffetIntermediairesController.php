<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEffetIntermediaireRequest;
use App\Http\Requests\StoreEffetIntermediaireRequest;
use App\Http\Requests\UpdateEffetIntermediaireRequest;
use App\Models\EffetIntermediaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EffetIntermediairesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('effet_intermediaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetIntermediaires = EffetIntermediaire::all();

        return view('admin.effetIntermediaires.index', compact('effetIntermediaires'));
    }

    public function create()
    {
        abort_if(Gate::denies('effet_intermediaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.effetIntermediaires.create');
    }

    public function store(StoreEffetIntermediaireRequest $request)
    {
        $effetIntermediaire = EffetIntermediaire::create($request->all());

        return redirect()->route('admin.effet-intermediaires.index');
    }

    public function edit(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.effetIntermediaires.edit', compact('effetIntermediaire'));
    }

    public function update(UpdateEffetIntermediaireRequest $request, EffetIntermediaire $effetIntermediaire)
    {
        $effetIntermediaire->update($request->all());

        return redirect()->route('admin.effet-intermediaires.index');
    }

    public function show(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.effetIntermediaires.show', compact('effetIntermediaire'));
    }

    public function destroy(EffetIntermediaire $effetIntermediaire)
    {
        abort_if(Gate::denies('effet_intermediaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetIntermediaire->delete();

        return back();
    }

    public function massDestroy(MassDestroyEffetIntermediaireRequest $request)
    {
        EffetIntermediaire::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
