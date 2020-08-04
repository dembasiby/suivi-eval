@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.questionnaire.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questionnaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.id') }}
                        </th>
                        <td>
                            {{ $questionnaire->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.description') }}
                        </th>
                        <td>
                            {{ $questionnaire->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.annee') }}
                        </th>
                        <td>
                            {{ $questionnaire->annee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.trimestre') }}
                        </th>
                        <td>
                            {{ $questionnaire->trimestre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.question') }}
                        </th>
                        <td>
                            @foreach($questionnaire->questions as $key => $question)
                                <span class="label label-info">{{ $question->description }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionnaire.fields.organisation') }}
                        </th>
                        <td>
                            {{ $questionnaire->organisation->sigle ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questionnaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection