<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEffetImmediatRequest;
use App\Http\Requests\StoreEffetImmediatRequest;
use App\Http\Requests\UpdateEffetImmediatRequest;
use App\Models\EffetImmediat;
use App\Models\EffetIntermediaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EffetImmediatsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('effet_immediat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetImmediats = EffetImmediat::all();

        return view('admin.effetImmediats.index', compact('effetImmediats'));
    }

    public function create()
    {
        abort_if(Gate::denies('effet_immediat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effet_intermediaires = EffetIntermediaire::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.effetImmediats.create', compact('effet_intermediaires'));
    }

    public function store(StoreEffetImmediatRequest $request)
    {
        $effetImmediat = EffetImmediat::create($request->all());

        return redirect()->route('admin.effet-immediats.index');
    }

    public function edit(EffetImmediat $effetImmediat)
    {
        abort_if(Gate::denies('effet_immediat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effet_intermediaires = EffetIntermediaire::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $effetImmediat->load('effet_intermediaire');

        return view('admin.effetImmediats.edit', compact('effet_intermediaires', 'effetImmediat'));
    }

    public function update(UpdateEffetImmediatRequest $request, EffetImmediat $effetImmediat)
    {
        $effetImmediat->update($request->all());

        return redirect()->route('admin.effet-immediats.index');
    }

    public function show(EffetImmediat $effetImmediat)
    {
        abort_if(Gate::denies('effet_immediat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetImmediat->load('effet_intermediaire', 'effetImmediatExtrants');

        return view('admin.effetImmediats.show', compact('effetImmediat'));
    }

    public function destroy(EffetImmediat $effetImmediat)
    {
        abort_if(Gate::denies('effet_immediat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effetImmediat->delete();

        return back();
    }

    public function massDestroy(MassDestroyEffetImmediatRequest $request)
    {
        EffetImmediat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
