<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExtrantRequest;
use App\Http\Requests\StoreExtrantRequest;
use App\Http\Requests\UpdateExtrantRequest;
use App\Models\EffetImmediat;
use App\Models\Extrant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExtrantsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('extrant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extrants = Extrant::all();

        return view('admin.extrants.index', compact('extrants'));
    }

    public function create()
    {
        abort_if(Gate::denies('extrant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effet_immediats = EffetImmediat::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.extrants.create', compact('effet_immediats'));
    }

    public function store(StoreExtrantRequest $request)
    {
        $extrant = Extrant::create($request->all());

        return redirect()->route('admin.extrants.index');
    }

    public function edit(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $effet_immediats = EffetImmediat::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $extrant->load('effet_immediat');

        return view('admin.extrants.edit', compact('effet_immediats', 'extrant'));
    }

    public function update(UpdateExtrantRequest $request, Extrant $extrant)
    {
        $extrant->update($request->all());

        return redirect()->route('admin.extrants.index');
    }

    public function show(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extrant->load('effet_immediat', 'extrantIndicateurs');

        return view('admin.extrants.show', compact('extrant'));
    }

    public function destroy(Extrant $extrant)
    {
        abort_if(Gate::denies('extrant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $extrant->delete();

        return back();
    }

    public function massDestroy(MassDestroyExtrantRequest $request)
    {
        Extrant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
