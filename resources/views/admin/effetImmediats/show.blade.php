@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.effetImmediat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.effet-immediats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.id') }}
                        </th>
                        <td>
                            {{ $effetImmediat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.code_effet_immediat') }}
                        </th>
                        <td>
                            {{ $effetImmediat->code_effet_immediat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.description') }}
                        </th>
                        <td>
                            {{ $effetImmediat->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.effetImmediat.fields.effet_intermediaire') }}
                        </th>
                        <td>
                            {{ $effetImmediat->effet_intermediaire->description ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.effet-immediats.index') }}">
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
            <a class="nav-link" href="#effet_immediat_extrants" role="tab" data-toggle="tab">
                {{ trans('cruds.extrant.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="effet_immediat_extrants">
            @includeIf('admin.effetImmediats.relationships.effetImmediatExtrants', ['extrants' => $effetImmediat->effetImmediatExtrants])
        </div>
    </div>
</div>

@endsection