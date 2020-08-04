@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.resultatIntermediaire.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.resultat-intermediaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.resultatIntermediaire.fields.id') }}
                        </th>
                        <td>
                            {{ $resultatIntermediaire->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resultatIntermediaire.fields.code_resultat_intermediaire') }}
                        </th>
                        <td>
                            {{ $resultatIntermediaire->code_resultat_intermediaire }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.resultatIntermediaire.fields.description') }}
                        </th>
                        <td>
                            {{ $resultatIntermediaire->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.resultat-intermediaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#resultat_intermediaire_probleme_centrals" role="tab" data-toggle="tab">
                {{ trans('cruds.problemeCentral.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="resultat_intermediaire_probleme_centrals">
            @includeIf('admin.resultatIntermediaires.relationships.resultatIntermediaireProblemeCentrals', ['problemeCentrals' => $resultatIntermediaire->resultatIntermediaireProblemeCentrals])
        </div>
    </div>
</div>

@endsection