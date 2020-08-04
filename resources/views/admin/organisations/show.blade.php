@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.organisation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organisations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organisation.fields.id') }}
                        </th>
                        <td>
                            {{ $organisation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organisation.fields.nom') }}
                        </th>
                        <td>
                            {{ $organisation->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organisation.fields.sigle') }}
                        </th>
                        <td>
                            {{ $organisation->sigle }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.organisations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection