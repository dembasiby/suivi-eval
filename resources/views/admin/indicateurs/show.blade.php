@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.indicateur.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.indicateurs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.indicateur.fields.id') }}
                        </th>
                        <td>
                            {{ $indicateur->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indicateur.fields.code_indicateur') }}
                        </th>
                        <td>
                            {{ $indicateur->code_indicateur }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indicateur.fields.description') }}
                        </th>
                        <td>
                            {{ $indicateur->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indicateur.fields.probleme_central') }}
                        </th>
                        <td>
                            {{ $indicateur->probleme_central->description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indicateur.fields.extrant') }}
                        </th>
                        <td>
                            {{ $indicateur->extrant->description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.indicateur.fields.organisation') }}
                        </th>
                        <td>
                            @foreach($indicateur->organisations as $key => $organisation)
                                <span class="label label-info">{{ $organisation->sigle }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.indicateurs.index') }}">
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
            <a class="nav-link" href="#indicateur_questions" role="tab" data-toggle="tab">
                {{ trans('cruds.question.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="indicateur_questions">
            @includeIf('admin.indicateurs.relationships.indicateurQuestions', ['questions' => $indicateur->indicateurQuestions])
        </div>
    </div>
</div>

@endsection
