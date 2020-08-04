@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.problemeCentral.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.probleme-centrals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.problemeCentral.fields.id') }}
                        </th>
                        <td>
                            {{ $problemeCentral->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.problemeCentral.fields.code_probleme_central') }}
                        </th>
                        <td>
                            {{ $problemeCentral->code_probleme_central }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.problemeCentral.fields.description') }}
                        </th>
                        <td>
                            {{ $problemeCentral->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.problemeCentral.fields.resultat_intermediaire') }}
                        </th>
                        <td>
                            {{ $problemeCentral->resultat_intermediaire->description ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.probleme-centrals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection