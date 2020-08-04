<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIndicateurRequest;
use App\Http\Requests\StoreIndicateurRequest;
use App\Http\Requests\UpdateIndicateurRequest;
use App\Models\Extrant;
use App\Models\Indicateur;
use App\Models\Organisation;
use App\Models\ProblemeCentral;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndicateursController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('indicateur_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateurs = Indicateur::all();

        return view('admin.indicateurs.index', compact('indicateurs'));
    }

    public function create()
    {
        abort_if(Gate::denies('indicateur_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $probleme_centrals = ProblemeCentral::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extrants = Extrant::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organisations = Organisation::all()->pluck('sigle', 'id');

        return view('admin.indicateurs.create', compact('probleme_centrals', 'extrants', 'organisations'));
    }

    public function store(StoreIndicateurRequest $request)
    {
        $indicateur = Indicateur::create($request->all());
        $indicateur->organisations()->sync($request->input('organisations', []));

        return redirect()->route('admin.indicateurs.index');
    }

    public function edit(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $probleme_centrals = ProblemeCentral::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extrants = Extrant::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organisations = Organisation::all()->pluck('sigle', 'id');

        $indicateur->load('probleme_central', 'extrant', 'organisations', 'team');

        return view('admin.indicateurs.edit', compact('probleme_centrals', 'extrants', 'organisations', 'indicateur'));
    }

    public function update(UpdateIndicateurRequest $request, Indicateur $indicateur)
    {
        $indicateur->update($request->all());
        $indicateur->organisations()->sync($request->input('organisations', []));

        return redirect()->route('admin.indicateurs.index');
    }

    public function show(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateur->load('probleme_central', 'extrant', 'organisations', 'team', 'indicateurQuestions');

        return view('admin.indicateurs.show', compact('indicateur'));
    }

    public function destroy(Indicateur $indicateur)
    {
        abort_if(Gate::denies('indicateur_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $indicateur->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndicateurRequest $request)
    {
        Indicateur::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
