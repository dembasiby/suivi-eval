<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProblemeCentralRequest;
use App\Http\Requests\StoreProblemeCentralRequest;
use App\Http\Requests\UpdateProblemeCentralRequest;
use App\Models\ProblemeCentral;
use App\Models\ResultatIntermediaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProblemeCentralsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('probleme_central_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $problemeCentrals = ProblemeCentral::all();

        return view('admin.problemeCentrals.index', compact('problemeCentrals'));
    }

    public function create()
    {
        abort_if(Gate::denies('probleme_central_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultat_intermediaires = ResultatIntermediaire::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.problemeCentrals.create', compact('resultat_intermediaires'));
    }

    public function store(StoreProblemeCentralRequest $request)
    {
        $problemeCentral = ProblemeCentral::create($request->all());

        return redirect()->route('admin.probleme-centrals.index');
    }

    public function edit(ProblemeCentral $problemeCentral)
    {
        abort_if(Gate::denies('probleme_central_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultat_intermediaires = ResultatIntermediaire::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $problemeCentral->load('resultat_intermediaire');

        return view('admin.problemeCentrals.edit', compact('resultat_intermediaires', 'problemeCentral'));
    }

    public function update(UpdateProblemeCentralRequest $request, ProblemeCentral $problemeCentral)
    {
        $problemeCentral->update($request->all());

        return redirect()->route('admin.probleme-centrals.index');
    }

    public function show(ProblemeCentral $problemeCentral)
    {
        abort_if(Gate::denies('probleme_central_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $problemeCentral->load('resultat_intermediaire');

        return view('admin.problemeCentrals.show', compact('problemeCentral'));
    }

    public function destroy(ProblemeCentral $problemeCentral)
    {
        abort_if(Gate::denies('probleme_central_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $problemeCentral->delete();

        return back();
    }

    public function massDestroy(MassDestroyProblemeCentralRequest $request)
    {
        ProblemeCentral::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
