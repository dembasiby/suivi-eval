@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.extrant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.extrants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.extrant.fields.id') }}
                        </th>
                        <td>
                            {{ $extrant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.extrant.fields.code_extrant') }}
                        </th>
                        <td>
                            {{ $extrant->code_extrant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.extrant.fields.description') }}
                        </th>
                        <td>
                            {{ $extrant->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.extrant.fields.effet_immediat') }}
                        </th>
                        <td>
                            {{ $extrant->effet_immediat->description ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.extrants.index') }}">
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
            <a class="nav-link" href="#extrant_indicateurs" role="tab" data-toggle="tab">
                {{ trans('cruds.indicateur.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="extrant_indicateurs">
            @includeIf('admin.extrants.relationships.extrantIndicateurs', ['indicateurs' => $extrant->extrantIndicateurs])
        </div>
    </div>
</div>

@endsection