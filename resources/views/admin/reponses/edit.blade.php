@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reponse.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reponses.update", [$reponse->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.reponse.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $reponse->description) }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reponse.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="question_id">{{ trans('cruds.reponse.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ ($reponse->question ? $reponse->question->id : old('question_id')) == $id ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reponse.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="questionnaire_id">{{ trans('cruds.reponse.fields.questionnaire') }}</label>
                <select class="form-control select2 {{ $errors->has('questionnaire') ? 'is-invalid' : '' }}" name="questionnaire_id" id="questionnaire_id" required>
                    @foreach($questionnaires as $id => $questionnaire)
                        <option value="{{ $id }}" {{ ($reponse->questionnaire ? $reponse->questionnaire->id : old('questionnaire_id')) == $id ? 'selected' : '' }}>{{ $questionnaire }}</option>
                    @endforeach
                </select>
                @if($errors->has('questionnaire'))
                    <div class="invalid-feedback">
                        {{ $errors->first('questionnaire') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reponse.fields.questionnaire_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection